<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Category Ordering Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration defines the logical ordering of categories without
    | modifying the database structure. Categories are ordered by their names
    | according to the business logic defined below.
    |
    */

    'main_categories' => [
        // Updated main menu order per business request
        'BRAND NEW LAPTOPS' => 1,
        'USED LAPTOPS' => 2,
        'LAPTOP ACCESSORIES' => 3,
        'ACCESSORIES' => 4,
        'PRINTERS' => 5,
        'SERVICES' => 6,
        'OTHER' => 7,
    ],

    'subcategory_ordering' => [
        // Updated subcategory orders per business request
        'LAPTOP ACCESSORIES' => [
            'Laptop Battery' => 1,
            'Laptop Keyboard' => 2,
            'Laptop Display' => 3,
            'Laptop Speaker' => 4,
            'Laptop Motherboard' => 5,
            'Laptop Wi-Fi Card' => 6,
            'Laptop Fan' => 7,
            'Laptop Hinges Cover' => 8,
            'Laptop Power Adapter' => 9,
            'Display Ribbon' => 10,
            'Laptop DVD Drive' => 11,
            'Laptop Skin' => 12,
            'Laptop Stand' => 13,
            'Laptop DC Power Jack' => 14,
            'Cooling Pad' => 15,
            'Laptop RAM' => 16,
            'Storage' => 17,
            'Laptop HDD' => 18,
            'Used SSD' => 19,
            'Used NVMe' => 20,
            'Enclosure' => 21,
            'Laptop Cooling Pad' => 22,
            'Laptop Bag' => 23,
            'Pouch' => 24,
        ],
        'ACCESSORIES' => [
            'Mouse' => 1,
            'Headphone' => 2,
            'Mouse Pad' => 3,
            'External HDD' => 4,
            'External SSD' => 5,
            'Pen Drive' => 6,
            'Micro SD' => 7,
            'Keyboard Protectors' => 8,
            'Thermal Paste' => 9,
            'Thermal Pad' => 10,
            'AirPods' => 11,
            'Virus Guard' => 12,
            'Cables' => 13,
        ],
        // No subcategories for BRAND NEW LAPTOPS, USED LAPTOPS, PRINTERS, SERVICES, OTHER per request
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Ordering Rules
    |--------------------------------------------------------------------------
    |
    | These rules apply when specific ordering is not defined above
    |
    */
    'default_rules' => [
        // For categories with BRAND NEW and USED subcategories
        'brand_new_pattern' => 'BRAND NEW',
        'used_pattern' => 'USED',
        
        // Default order: Brand New (1), Others (by name), Used (last)
        'brand_new_priority' => 1,
        'others_priority' => 2,
        'used_priority' => 3,
    ],
];
