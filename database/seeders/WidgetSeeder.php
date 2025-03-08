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
                            'title' => 'Community Empowerment',
                            'description' => 'Building stronger communities through grassroots initiatives and local leadership development.'
                        ],
                        [
                            'icon' => 'fa fa-balance-scale',
                            'title' => 'Policy Advocacy',
                            'description' => 'Championing policies that promote social justice, economic growth, and sustainable development.'
                        ],
                        [
                            'icon' => 'fa fa-graduation-cap',
                            'title' => 'Youth Development',
                            'description' => 'Investing in the next generation through education, mentorship, and leadership programs.'
                        ]
                    ]
                ]),
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
