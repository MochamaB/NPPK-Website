<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get counts for dashboard stats
        $stats = [
            'pages' => Page::count(),
            'menus' => Menu::count(),
            'menuItems' => MenuItem::count(),
            'users' => User::count(),
        ];
        
        // Get recent activity (could be expanded with a proper activity log)
        $recentActivity = [
            [
                'action' => 'Admin Login',
                'user' => 'Admin',
                'date' => now()->format('M d, Y'),
                'details' => 'User logged in successfully'
            ],
            [
                'action' => 'Page Updated',
                'user' => 'Admin',
                'date' => now()->subDays(1)->format('M d, Y'),
                'details' => 'Home page content updated'
            ],
            [
                'action' => 'Menu Modified',
                'user' => 'Admin',
                'date' => now()->subDays(2)->format('M d, Y'),
                'details' => 'Added new menu item to main navigation'
            ]
        ];
        
        return view('admin.dashboard', compact('stats', 'recentActivity'));
    }
}
