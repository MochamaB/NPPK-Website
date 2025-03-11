<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Widget;
use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        // Get the home page using the new Page model
        $homePage = Page::where('slug', 'home')
                       ->where('is_active', true)
                       ->first();
        
        if ($homePage) {
            // If we have a home page in the new system, use it
            // Get all widgets associated with the home page
            $headerWidgets = $homePage->getWidgetsBySection('header');
            $mainWidgets = $homePage->getWidgetsBySection('main');
            $footerWidgets = $homePage->getWidgetsBySection('footer');
            
            // For backward compatibility, also get individual widgets by name
            $slider = $headerWidgets->where('name', 'Home Page Hero Slider')->first();
            $whatWeDo = $mainWidgets->where('name', 'Home Page What We Do')->first();
            $counterStats = $mainWidgets->where('name', 'Home Page Counter Stats')->first();
            $teamShowcase = $mainWidgets->where('name', 'Home Page Leadership Team')->first();
            $magazine = $mainWidgets->where('name', 'Home Page Magazine Section')->first();
            
            // Pass both the page and individual widgets to the view
            return view('pages.Clientpages.home', [
                'page' => $homePage,
                'headerWidgets' => $headerWidgets,
                'mainWidgets' => $mainWidgets,
                'footerWidgets' => $footerWidgets,
                'slider' => $slider ?: Widget::where('name', 'Home Page Hero Slider')->where('is_active', true)->first(),
                'whatWeDo' => $whatWeDo ?: Widget::where('name', 'Home Page What We Do')->where('is_active', true)->first(),
                'counterStats' => $counterStats ?: Widget::where('name', 'Home Page Counter Stats')->where('is_active', true)->first(),
                'teamShowcase' => $teamShowcase ?: Widget::where('name', 'Home Page Leadership Team')->where('is_active', true)->first(),
                'magazine' => $magazine ?: Widget::where('name', 'Home Page Magazine Section')->where('is_active', true)->first()
            ]);
        } else {
            // Fallback to the old method if no home page exists in the new system
            $slider = Widget::where('name', 'Home Page Hero Slider')
                           ->where('is_active', true)
                           ->first();

            $whatWeDo = Widget::where('name', 'Home Page What We Do')
                             ->where('is_active', true)
                             ->first();

            $counterStats = Widget::where('name', 'Home Page Counter Stats')
                                ->where('is_active', true)
                                ->first();

            $teamShowcase = Widget::where('name', 'Home Page Leadership Team')
                                 ->where('is_active', true)
                                 ->first();

            $magazine = Widget::where('name', 'Home Page Magazine Section')
                            ->where('is_active', true)
                            ->first();

            // Pass the entire widget object to the view
            return view('pages.Clientpages.home', [
                'slider' => $slider,
                'whatWeDo' => $whatWeDo,
                'counterStats' => $counterStats,
                'teamShowcase' => $teamShowcase,
                'magazine' => $magazine
            ]);
        }
    }

    public function about()
    {
        // Try to get the page from the new system
        $aboutPage = Page::where('slug', 'about-party')
                        ->where('is_active', true)
                        ->first();
        
        if ($aboutPage) {
            return view('pages.' . $aboutPage->template, ['page' => $aboutPage]);
        }
        
        // Fallback to the old method
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function team()
    {
        return view('pages.team');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function testimonials()
    {
        return view('pages.testimonials');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function cookies()
    {
        return view('pages.cookies');
    }

    public function help()
    {
        return view('pages.help');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
