<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Widget;

class HomeController extends Controller
{
    public function index()
    {
        // Get the home page widgets
        $slider = Widget::where('name', 'Home Page Hero Slider')
                       ->where('is_active', true)
                       ->first();

        $whatWeDo = Widget::where('name', 'Home Page What We Do')
                         ->where('is_active', true)
                         ->first();

        // Pass the entire widget object to the view
        return view('pages.Clientpages.home', [
            'slider' => $slider,
            'whatWeDo' => $whatWeDo
        ]);
    }

    public function about()
    {
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
