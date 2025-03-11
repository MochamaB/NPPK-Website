<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the main navigation menu
        $mainMenu = Menu::create([
            'name' => 'Main Navigation',
            'location' => 'main',
            'is_active' => true
        ]);

        // Create the footer menu
        $footerMenu = Menu::create([
            'name' => 'Footer Menu',
            'location' => 'footer',
            'is_active' => true
        ]);

        // Get all pages to link menu items to
        $pages = Page::all()->keyBy('slug');

        // Create main menu items
        $homeMenuItem = $this->createMenuItem($mainMenu->id, $pages['home']->id, 'Home', null, 1);
        
        // About Party with submenu
        $aboutMenuItem = $this->createMenuItem($mainMenu->id, $pages['about-party']->id, 'About Party', null, 2);
        $this->createMenuItem($mainMenu->id, $pages['vision-and-mission']->id, 'Vision and Mission', $aboutMenuItem->id, 1);
        $this->createMenuItem($mainMenu->id, $pages['party-history']->id, 'Party History', $aboutMenuItem->id, 2);
        
        // Other main menu items
        $this->createMenuItem($mainMenu->id, $pages['leadership']->id, 'Leadership', null, 3);
        $this->createMenuItem($mainMenu->id, $pages['news']->id, 'News', null, 4);
        $this->createMenuItem($mainMenu->id, $pages['resources']->id, 'Resources', null, 5);
        $this->createMenuItem($mainMenu->id, $pages['shop']->id, 'Shop', null, 6);
        $this->createMenuItem($mainMenu->id, $pages['contact-us']->id, 'Contact Us', null, 7);

        // Create footer menu items (simplified version of main menu)
        $this->createMenuItem($footerMenu->id, $pages['home']->id, 'Home', null, 1);
        $this->createMenuItem($footerMenu->id, $pages['about-party']->id, 'About Party', null, 2);
        $this->createMenuItem($footerMenu->id, $pages['leadership']->id, 'Leadership', null, 3);
        $this->createMenuItem($footerMenu->id, $pages['contact-us']->id, 'Contact Us', null, 4);
    }

    /**
     * Helper function to create a menu item
     */
    private function createMenuItem($menuId, $pageId, $title, $parentId = null, $orderIndex = 0, $cssClass = null)
    {
        return MenuItem::create([
            'menu_id' => $menuId,
            'parent_id' => $parentId,
            'page_id' => $pageId,
            'title' => $title,
            'order_index' => $orderIndex,
            'css_class' => $cssClass,
            'is_active' => true
        ]);
    }
}
