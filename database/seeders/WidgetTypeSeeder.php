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
            ]
        ]);
    }
}
