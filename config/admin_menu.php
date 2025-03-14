<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Sidebar Menu Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for the admin sidebar menu.
    | Each menu item can have the following properties:
    |
    | - title: The display text for the menu item
    | - icon: The icon class (using Remix Icon)
    | - route: The named route for the menu item (if it's a direct link)
    | - permission: The permission required to see this menu item (optional)
    | - children: An array of submenu items (for dropdown menus)
    |
    */

    // Dashboard is handled separately in the view
    
    'categories' => [
        [
            'title' => 'Content Management',
            'items' => [
                // Pages
                [
                    'title' => 'Pages',
                    'icon' => 'ri-pages-line',
                    'id' => 'sidebarPages',
                    'children' => [
                        [
                            'title' => 'All Pages',
                            'route' => 'admin.pages.index',
                            'permission' => 'manage_pages',
                        ],
                        [
                            'title' => 'Add Page',
                            'route' => 'admin.pages.create',
                            'permission' => 'create_pages',
                        ],
                    ],
                ],
                
                // Navigation Management
                [
                    'title' => 'Menus',
                    'icon' => 'ri-menu-line',
                    'id' => 'sidebarMenus',
                    'children' => [
                        [
                            'title' => 'All Menus',
                            'route' => 'admin.menus.index',
                            'permission' => 'manage_menus',
                        ],
                        [
                            'title' => 'Add Menu',
                            'route' => 'admin.menus.create',
                            'permission' => 'create_menus',
                        ],
                    ],
                ],
                
                // Widgets Management
                [
                    'title' => 'Widgets',
                    'icon' => 'ri-layout-grid-line',
                    'id' => 'sidebarWidgets',
                    'children' => [
                        [
                            'title' => 'All Widgets',
                            'route' => null, // Replace with actual route when available
                            'permission' => 'manage_widgets',
                        ],
                        [
                            'title' => 'Add Widget',
                            'route' => null, // Replace with actual route when available
                            'permission' => 'create_widgets',
                        ],
                    ],
                ],
            ],
        ],
        
        [
            'title' => 'User Management',
            'items' => [
                // Users Management
                [
                    'title' => 'Users',
                    'icon' => 'ri-user-line',
                    'id' => 'sidebarUsers',
                    'children' => [
                        [
                            'title' => 'All Users',
                            'route' => null, // Replace with actual route when available
                            'permission' => 'manage_users',
                        ],
                        [
                            'title' => 'Add User',
                            'route' => null, // Replace with actual route when available
                            'permission' => 'create_users',
                        ],
                    ],
                ],
            ],
        ],
        
        [
            'title' => 'System',
            'items' => [
                // Settings (no children)
                [
                    'title' => 'Settings',
                    'icon' => 'ri-settings-3-line',
                    'route' => null, // Replace with actual route when available
                    'permission' => 'manage_settings',
                ],
            ],
        ],
    ],
];
