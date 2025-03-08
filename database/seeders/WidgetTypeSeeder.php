<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('widget_types')->insert([
            [
                'name' => 'slider',
                'component' => 'components.widgets.slider',
                'description' => 'Hero slider section with customizable title, description, and CTA button',
                'schema' => json_encode([
                    'properties' => [
                        'slides' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'background_image' => [
                                        'type' => 'string',
                                        'description' => 'Path to slide background image'
                                    ],
                                    'title' => [
                                        'type' => 'string',
                                        'description' => 'Slide title'
                                    ],
                                    'description' => [
                                        'type' => 'string',
                                        'description' => 'Slide description text'
                                    ],
                                    'button_text' => [
                                        'type' => 'string',
                                        'description' => 'Call to action button text'
                                    ],
                                    'button_link' => [
                                        'type' => 'string',
                                        'description' => 'Call to action button URL'
                                    ]
                                ],
                                'required' => ['background_image', 'title']
                            ]
                        ]
                    ],
                    'required' => ['slides']
                ]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'what-we-do',
                'component' => 'components.widgets.what-we-do',
                'description' => 'Section for displaying key activities and features',
                'schema' => json_encode([
                    'properties' => [
                        'title' => [
                            'type' => 'string',
                            'description' => 'Section title'
                        ],
                        'description' => [
                            'type' => 'string',
                            'description' => 'Section description'
                        ],
                        'items' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'icon' => [
                                        'type' => 'string',
                                        'description' => 'Font awesome icon class'
                                    ],
                                    'title' => [
                                        'type' => 'string',
                                        'description' => 'Item title'
                                    ],
                                    'description' => [
                                        'type' => 'string',
                                        'description' => 'Item description'
                                    ]
                                ],
                                'required' => ['title', 'description']
                            ]
                        ]
                    ],
                    'required' => ['title', 'items']
                ]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
