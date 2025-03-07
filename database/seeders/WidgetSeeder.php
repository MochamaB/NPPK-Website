<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetSeeder extends Seeder
{
    public function run()
    {
        // Get the widget type ID for slider
        $sliderTypeId = DB::table('widget_types')->where('name', 'slider')->first()->id;

        DB::table('widgets')->insert([
            [
                'widget_type_id' => $sliderTypeId,
                'name' => 'Home Page Hero Slider',
                'data' => json_encode([
                    'slides' => [
                        [
                            'background_image' => 'assets/images/slider/slider-1.jpg',
                            'title' => 'Welcome to NPPK',
                            'description' => 'Building a Better Future Together',
                            'button_text' => 'Join NPPK',
                            'button_link' => '/join'
                        ],
                        [
                            'background_image' => 'assets/images/slider/slider-2.jpg',
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
            ]
        ]);
    }
}
