<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetSeeder extends Seeder
{
    public function run()
    {
        // Get the widget type IDs
        $sliderTypeId = DB::table('widget_types')->where('name', 'slider')->first()->id;
        $whatWeDoTypeId = DB::table('widget_types')->where('name', 'what-we-do')->first()->id;
        $counterStatsTypeId = DB::table('widget_types')->where('name', 'counter-stats')->first()->id;
        $teamShowcaseTypeId = DB::table('widget_types')->where('name', 'team-showcase')->first()->id;
        $magazineTypeId = DB::table('widget_types')->where('name', 'magazine')->first()->id;

        DB::table('widgets')->insert([
            [
                'widget_type_id' => $sliderTypeId,
                'name' => 'Home Page Hero Slider',
                'data' => json_encode([
                    'slides' => [
                        [
                            'background_image' => 'assets/images/slider/1.jpg',
                            'title' => 'Welcome to NPPK',
                            'description' => 'Building a Better Future Together',
                            'button_text' => 'Join NPPK',
                            'button_link' => '/join'
                        ],
                        [
                            'background_image' => 'assets/images/slider/2.jpg',
                            'title' => 'Make Your Voice Heard',
                            'description' => 'Together We Can Make a Difference',
                            'button_text' => 'Get Involved',
                            'button_link' => '/volunteer'
                        ]
                    ]
                ]),
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'widget_type_id' => $whatWeDoTypeId,
                'name' => 'Home Page What We Do',
                'data' => json_encode([
                    'title' => 'Our Vision and Mission',
                    'description' => 'Our key focus areas and initiatives',
                    'items' => [
                        [
                            'icon' => 'fa fa-users',
                            'title' => 'Vision',
                            'description' => 'A developed advanced industrial and disciplined state providing decent livelihood to all its Citizens across our land of Kenya with zero corruption and absence of tribalism..'
                        ],
                        [
                            'icon' => 'fa fa-balance-scale',
                            'title' => 'Mission',
                            'description' => 'To build a Kenya that serves all Kenyans, eliminating the culture where political leaders use power for personal enrichment. We will achieve this by restructuring political and economic institutions to promote shared prosperity for all.'
                        ],
                        [
                            'icon' => 'fa fa-graduation-cap',
                            'title' => 'Values',
                            'description' => 'The National Patriotic Party upholds core values that emphasize respect for human rights and freedoms, discipline, and the rule of law. '
                        ]
                    ]
                ]),
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'widget_type_id' => $counterStatsTypeId,
                'name' => 'Home Page Counter Stats',
                'data' => json_encode([
                    'title' => 'Our Impact',
                    'description' => 'Making a difference across Kenya',
                    'stats' => [
                        [
                            'icon' => 'assets/images/icon-img/1.png',
                            'count' => '200',
                            'label' => 'Donations'
                        ],
                        [
                            'icon' => 'assets/images/icon-img/2.png',
                            'count' => '700',
                            'label' => 'Members'
                        ],
                        [
                            'icon' => 'assets/images/icon-img/3.png',
                            'count' => '10',
                            'label' => 'Years of Operation'
                        ]
                    ]
                ]),
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'widget_type_id' => $teamShowcaseTypeId,
                'name' => 'Home Page Leadership Team',
                'data' => json_encode([
                    'title' => 'Party Leadership',
                    'description' => 'Meet the dedicated leaders driving our vision forward',
                    'members' => [
                        [
                            'image' => 'assets/images/team/leader1.jpg',
                            'name' => 'John Kamau',
                            'position' => 'Party Chairman',
                            'description' => 'A seasoned political leader with over 20 years of experience in public service.',
                            'social_links' => [
                                'twitter' => 'https://twitter.com/johnkamau',
                                'facebook' => 'https://facebook.com/johnkamau'
                            ]
                        ],
                        [
                            'image' => 'assets/images/team/leader2.jpg',
                            'name' => 'Sarah Wanjiku',
                            'position' => 'Secretary General',
                            'description' => 'Former county executive with a strong background in policy development.',
                            'social_links' => [
                                'twitter' => 'https://twitter.com/sarahwanjiku',
                                'linkedin' => 'https://linkedin.com/in/sarahwanjiku'
                            ]
                        ],
                        [
                            'image' => 'assets/images/team/leader3.jpg',
                            'name' => 'David Omondi',
                            'position' => 'Youth Leader',
                            'description' => 'Passionate advocate for youth empowerment and education.',
                            'social_links' => [
                                'instagram' => 'https://instagram.com/davidomondi',
                                'twitter' => 'https://twitter.com/davidomondi'
                            ]
                        ],
                        [
                            'image' => 'assets/images/team/leader4.jpg',
                            'name' => 'Amina Hassan',
                            'position' => 'Treasurer',
                            'description' => 'Certified accountant with expertise in financial management.',
                            'social_links' => [
                                'linkedin' => 'https://linkedin.com/in/aminahassan',
                                'twitter' => 'https://twitter.com/aminahassan'
                            ]
                        ]
                    ]
                ]),
                'order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'widget_type_id' => $magazineTypeId,
                'name' => 'Home Page Magazine Section',
                'data' => json_encode([
                    'campaign_news' => [
                        [
                            'image' => 'assets/images/banner/34.jpg',
                            'title' => 'RROP deadline fast approaching',
                            'author' => 'Admin',
                            'date' => '14 Feb, 2025'
                        ],
                        [
                            'image' => 'assets/images/banner/31.jpg',
                            'title' => 'The handshake has happened',
                            'author' => 'Admin',
                            'date' => '04 March, 2025'
                        ],
                        [
                            'image' => 'assets/images/banner/32.jpg',
                            'title' => 'Vetting of IEBC Commisioners start',
                            'author' => 'Admin',
                            'date' => '14 May, 2016'
                        ]
                    ],
                    'campaign_news_link' => '/blog',
                    'magazine_articles' => [
                        [
                            'image' => 'assets/images/banner/33.jpg',
                            'title' => 'Its time to start picking your party ticket',
                            'author' => 'Admin',
                            'date' => '14 Feb, 2025'
                        ],
                        [
                            'image' => 'assets/images/banner/34.jpg',
                            'title' => 'Can Raila win at the AU?',
                            'author' => 'Admin',
                            'date' => '15 Feb, 2025'
                        ],
                        [
                            'image' => 'assets/images/banner/33.jpg',
                            'title' => 'The Gen Z vote',
                            'author' => 'Admin',
                            'date' => '19 Feb, 2025'
                        ]
                    ],
                    'magazine_link' => '/magazine'
                ]),
                'order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
