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
            ],
            [
                'name' => 'counter-stats',
                'component' => 'components.widgets.counter-stats',
                'description' => 'Display numerical statistics with icons',
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
                        'stats' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'icon' => [
                                        'type' => 'string',
                                        'description' => 'Font awesome icon class'
                                    ],
                                    'count' => [
                                        'type' => 'string',
                                        'description' => 'Number to display'
                                    ],
                                    'label' => [
                                        'type' => 'string',
                                        'description' => 'Label below the number'
                                    ]
                                ],
                                'required' => ['count', 'label']
                            ]
                        ]
                    ],
                    'required' => ['stats']
                ]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'team-showcase',
                'component' => 'components.widgets.team-showcase',
                'description' => 'Display team members or leadership with their details',
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
                        'members' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'image' => [
                                        'type' => 'string',
                                        'description' => 'Path to member image'
                                    ],
                                    'name' => [
                                        'type' => 'string',
                                        'description' => 'Member name'
                                    ],
                                    'position' => [
                                        'type' => 'string',
                                        'description' => 'Member position or role'
                                    ],
                                    'description' => [
                                        'type' => 'string',
                                        'description' => 'Brief description about the member'
                                    ],
                                    'social_links' => [
                                        'type' => 'object',
                                        'properties' => [
                                            'facebook' => ['type' => 'string'],
                                            'twitter' => ['type' => 'string'],
                                            'linkedin' => ['type' => 'string'],
                                            'instagram' => ['type' => 'string']
                                        ]
                                    ]
                                ],
                                'required' => ['name', 'position', 'image']
                            ]
                        ]
                    ],
                    'required' => ['title', 'members']
                ]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'magazine',
                'component' => 'components.widgets.magazine',
                'description' => 'Display latest campaign news, magazine articles, and contact form',
                'schema' => json_encode([
                    'properties' => [
                        'campaign_news' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'image' => [
                                        'type' => 'string',
                                        'description' => 'Path to news image'
                                    ],
                                    'title' => [
                                        'type' => 'string',
                                        'description' => 'News title'
                                    ],
                                    'author' => [
                                        'type' => 'string',
                                        'description' => 'News author'
                                    ],
                                    'date' => [
                                        'type' => 'string',
                                        'description' => 'Publication date'
                                    ]
                                ],
                                'required' => ['title', 'image', 'date']
                            ]
                        ],
                        'campaign_news_link' => [
                            'type' => 'string',
                            'description' => 'Link to all campaign news'
                        ],
                        'magazine_articles' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'properties' => [
                                    'image' => [
                                        'type' => 'string',
                                        'description' => 'Path to article image'
                                    ],
                                    'title' => [
                                        'type' => 'string',
                                        'description' => 'Article title'
                                    ],
                                    'author' => [
                                        'type' => 'string',
                                        'description' => 'Article author'
                                    ],
                                    'date' => [
                                        'type' => 'string',
                                        'description' => 'Publication date'
                                    ]
                                ],
                                'required' => ['title', 'image', 'date']
                            ]
                        ],
                        'magazine_link' => [
                            'type' => 'string',
                            'description' => 'Link to all magazine articles'
                        ],
                        'contact_form' => [
                            'type' => 'object',
                            'properties' => [
                                'title' => [
                                    'type' => 'string',
                                    'description' => 'Contact form title'
                                ],
                                'description' => [
                                    'type' => 'string',
                                    'description' => 'Contact form description'
                                ],
                                'fields' => [
                                    'type' => 'array',
                                    'items' => [
                                        'type' => 'object',
                                        'properties' => [
                                            'label' => [
                                                'type' => 'string',
                                                'description' => 'Field label'
                                            ],
                                            'type' => [
                                                'type' => 'string',
                                                'description' => 'Field type (e.g. text, email, textarea)'
                                            ],
                                            'placeholder' => [
                                                'type' => 'string',
                                                'description' => 'Field placeholder text'
                                            ]
                                        ],
                                        'required' => ['label', 'type']
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'required' => ['campaign_news', 'magazine_articles', 'contact_form']
                ]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
