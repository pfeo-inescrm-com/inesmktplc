<?php

function inesmktplc_register_required_plugins()
{
    $plugins = [
        [
            'name'      => 'Woocommerce',
            'slug'      => 'woocommerce',
            'required'      => true
        ],
        [
            'name'      => 'Loco Translate',
            'slug'      => 'loco-translate',
            'required'      => true
        ],
        [
            'name'      => 'Ninja Forms',
            'slug'      => 'ninja-forms',
            'required'      => true
        ],
        [
            'name'      => 'Multiple Post Thumbnails',
            'slug'      => 'multiple-post-thumbnails',
            'required'      => true
        ]

    ];

    $config = [
        'id'      => 'inesmktplc',
        'menu'      => 'tgmpa-install-plugins',
        'parent_slug'      => 'themes.php',
        'capability'      => 'edit_theme_options',
        'has_notices'      => true,
        'dismissable'      => true
    ];

    tgmpa($plugins, $config);
}
