<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Widget;
use App\Models\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified page.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug = 'home')
    {
        $page = Page::where('slug', $slug)
                    ->where('is_active', true)
                    ->firstOrFail();
        
        // Get the main navigation menu
        $mainMenu = Menu::getByLocation('main');
        
        // For all pages, use the template specified in the page record
        return view('pages.' . $page->template, [
            'page' => $page,
            'mainMenu' => $mainMenu
        ]);
    }
}
