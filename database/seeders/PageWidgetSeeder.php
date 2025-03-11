<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Widget;
use App\Models\WidgetType;

class PageWidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create widget types if they don't exist
        $sliderType = WidgetType::firstOrCreate(
            ['name' => 'slider'],
            [
                'component' => 'components.widgets.slider',
                'description' => 'Hero slider for page headers',
                'schema' => [
                    'required' => ['slides'],
                    'properties' => [
                        'slides' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'object',
                                'required' => ['title', 'description', 'image'],
                                'properties' => [
                                    'title' => ['type' => 'string'],
                                    'description' => ['type' => 'string'],
                                    'image' => ['type' => 'string'],
                                    'button_text' => ['type' => 'string'],
                                    'button_url' => ['type' => 'string']
                                ]
                            ]
                        ]
                    ]
                ],
                'is_active' => true
            ]
        );

        // Create a slider widget
        $sliderWidget = Widget::firstOrCreate(
            ['name' => 'Home Page Hero Slider'],
            [
                'widget_type_id' => $sliderType->id,
                'data' => [
                    'slides' => [
                        [
                            'title' => 'Welcome to NPPK',
                            'description' => 'Building a better future for all Kenyans',
                            'image' => 'assets/img/slider/slider-1.jpg',
                            'button_text' => 'Learn More',
                            'button_url' => '/about'
                        ],
                        [
                            'title' => 'Join Our Movement',
                            'description' => 'Together we can make a difference',
                            'image' => 'assets/img/slider/slider-2.jpg',
                            'button_text' => 'Get Involved',
                            'button_url' => '/contact'
                        ]
                    ]
                ],
                'order' => 1,
                'is_active' => true
            ]
        );

        // Create main navigation pages based on the menu structure
        $homePage = Page::firstOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'description' => 'Welcome to the National Progressive Party of Kenya',
                'meta_keywords' => 'NPPK, Kenya, political party, progressive',
                'meta_description' => 'The official website of the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 1,
                'template' => 'default'
            ]
        );

        $aboutPage = Page::firstOrCreate(
            ['slug' => 'about-party'],
            [
                'title' => 'About Party',
                'description' => 'Learn about the National Progressive Party of Kenya',
                'meta_keywords' => 'NPPK, about, history, vision, mission',
                'meta_description' => 'Learn about the National Progressive Party of Kenya, our history, vision and mission',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 2,
                'template' => 'default'
            ]
        );

        // Create submenu items for About Party
        $visionPage = Page::firstOrCreate(
            ['slug' => 'vision-and-mission'],
            [
                'title' => 'Vision and Mission',
                'description' => 'Our vision and mission for Kenya',
                'meta_keywords' => 'NPPK, vision, mission, goals',
                'meta_description' => 'The vision and mission of the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 1,
                'parent_id' => $aboutPage->id,
                'template' => 'default'
            ]
        );

        $historyPage = Page::firstOrCreate(
            ['slug' => 'party-history'],
            [
                'title' => 'Party History',
                'description' => 'The history of NPPK',
                'meta_keywords' => 'NPPK, history, foundation, milestones',
                'meta_description' => 'The history and milestones of the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 2,
                'parent_id' => $aboutPage->id,
                'template' => 'default'
            ]
        );

        // Create other main menu items
        $leadershipPage = Page::firstOrCreate(
            ['slug' => 'leadership'],
            [
                'title' => 'Leadership',
                'description' => 'Meet our party leadership',
                'meta_keywords' => 'NPPK, leadership, officials, executives',
                'meta_description' => 'Meet the leadership of the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 3,
                'template' => 'default'
            ]
        );

        $newsPage = Page::firstOrCreate(
            ['slug' => 'news'],
            [
                'title' => 'News',
                'description' => 'Latest news and updates',
                'meta_keywords' => 'NPPK, news, updates, events',
                'meta_description' => 'Latest news and updates from the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 4,
                'template' => 'default'
            ]
        );

        $resourcesPage = Page::firstOrCreate(
            ['slug' => 'resources'],
            [
                'title' => 'Resources',
                'description' => 'Party resources and documents',
                'meta_keywords' => 'NPPK, resources, documents, downloads',
                'meta_description' => 'Resources and documents from the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 5,
                'template' => 'default'
            ]
        );

        $shopPage = Page::firstOrCreate(
            ['slug' => 'shop'],
            [
                'title' => 'Shop',
                'description' => 'NPPK merchandise and products',
                'meta_keywords' => 'NPPK, shop, merchandise, products',
                'meta_description' => 'Shop for National Progressive Party of Kenya merchandise and products',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 6,
                'template' => 'default'
            ]
        );

        $contactPage = Page::firstOrCreate(
            ['slug' => 'contact-us'],
            [
                'title' => 'Contact Us',
                'description' => 'Get in touch with NPPK',
                'meta_keywords' => 'NPPK, contact, email, phone, address',
                'meta_description' => 'Contact the National Progressive Party of Kenya',
                'is_active' => true,
                'show_in_menu' => true,
                'menu_order' => 7,
                'template' => 'default'
            ]
        );

        // Associate the slider widget with the home page
        if (!$homePage->widgets()->where('widget_id', $sliderWidget->id)->exists()) {
            $homePage->widgets()->attach($sliderWidget->id, [
                'section' => 'header',
                'order' => 1
            ]);
        }
    }
}
