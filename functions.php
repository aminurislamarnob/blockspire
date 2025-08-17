<?php
// Init custom block styles
add_action( 'init', function() {

    // Add rounded style to buttons
    register_block_style(
        'core/button',
        array(
            'name'  => 'rounded',
            'label' => __( 'Rounded', 'blockspire' ),
            'inline_style' => '
                .wp-block-button.is-style-rounded .wp-block-button__link {
                    border-radius: 24px;
                    padding: 12px 32px;
                    font-family: var(--wp--preset--font-family--poppins);
                    font-weight: 600;
                    background: var(--wp--preset--color--dark-bg);
                    color: var(--wp--preset--color--text-white);
                    font-size: var(--wp--preset--font-size--button-small);
                    line-height: 20px;
                    transition: all 0.3s ease;
                }
                .wp-block-button.is-style-rounded .wp-block-button__link:hover {
                    background: var(--wp--preset--color--primary);
                    color: var(--wp--preset--color--text-white);
                }
            '
        )
    );

    // Add hover style to navigation links
    register_block_style(
        'core/navigation-link',
        array(
            'name'  => 'hover-primary',
            'label' => __( 'Hover Primary', 'blockspire' ),
            'inline_style' => '
                .wp-block-navigation-item.is-style-hover-primary a{
                    transition: all 0.3s ease;
                }
                .wp-block-navigation-item.is-style-hover-primary a:hover {
                    color: var(--wp--preset--color--primary) !important;
                }
            '
        )
    );
} );
