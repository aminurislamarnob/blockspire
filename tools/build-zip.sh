#!/usr/bin/env bash
# Builds a clean WordPress.org submission zip containing only shipped files.
# Dev tooling only - this script is not itself included in the zip.
# Usage: bash tools/build-zip.sh

set -euo pipefail

SLUG="blockspire"
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
BUILD="${ROOT}/build"
STAGE="${BUILD}/${SLUG}"

VERSION="$(sed -n 's/^Version:[[:space:]]*//p' "${ROOT}/style.css" | head -1 | tr -d '[:space:]')"

if [ -z "${VERSION}" ]; then
	echo "Could not read Version from style.css" >&2
	exit 1
fi

rm -rf "${BUILD}"
mkdir -p "${STAGE}"

# Ship only what the theme needs at runtime. Everything else is dev tooling.
rsync -a \
	--exclude '.git' \
	--exclude '.gitignore' \
	--exclude 'node_modules' \
	--exclude 'vendor' \
	--exclude 'tools' \
	--exclude 'build' \
	--exclude 'package.json' \
	--exclude 'package-lock.json' \
	--exclude 'composer.json' \
	--exclude 'composer.lock' \
	--exclude 'phpcs.xml.dist' \
	--exclude '.editorconfig' \
	--exclude 'CLAUDE.md' \
	--exclude 'docs' \
	--exclude 'README.md' \
	--exclude 'assets/images/src' \
	--exclude '.DS_Store' \
	"${ROOT}/" "${STAGE}/"

cd "${BUILD}"
zip -rq "${SLUG}-${VERSION}.zip" "${SLUG}"

SIZE="$(du -h "${SLUG}-${VERSION}.zip" | cut -f1)"
COUNT="$(find "${STAGE}" -type f | wc -l | tr -d '[:space:]')"

echo "Built build/${SLUG}-${VERSION}.zip  (${SIZE}, ${COUNT} files)"
echo
echo "Sanity checks:"
for required in style.css theme.json readme.txt screenshot.png; do
	if [ -f "${STAGE}/${required}" ]; then
		echo "  ok      ${required}"
	else
		echo "  MISSING ${required}"
	fi
done
for forbidden in node_modules vendor tools docs package.json composer.json; do
	if [ -e "${STAGE}/${forbidden}" ]; then
		echo "  LEAKED  ${forbidden}"
	fi
done
