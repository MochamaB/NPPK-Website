<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class BreadcrumbService
{
    /**
     * Generate breadcrumb items based on current route
     *
     * @return array
     */
    public static function generate()
    {
        $currentRouteName = Route::currentRouteName();
        $currentRouteSegments = explode('.', $currentRouteName);
        
        $items = [];
        $routeName = '';
        
        // Add Dashboard as the first item
        if ($currentRouteName !== 'admin.dashboard') {
            $items[] = [
                'label' => 'Dashboard',
                'route' => 'admin.dashboard'
            ];
        }
        
        // Build breadcrumb items based on route segments
        foreach ($currentRouteSegments as $index => $segment) {
            // Skip 'admin' segment in breadcrumb display
            if ($segment === 'admin' && $index === 0) {
                $routeName .= $segment;
                continue;
            }
            
            $routeName .= ($routeName ? '.' : '') . $segment;
            
            // Check if this is the last segment (current page)
            if ($index === count($currentRouteSegments) - 1) {
                $items[] = [
                    'label' => ucwords(str_replace(['-', '_'], ' ', $segment))
                ];
            } else {
                // Only add route if it exists
                if (Route::has($routeName)) {
                    $items[] = [
                        'label' => ucwords(str_replace(['-', '_'], ' ', $segment)),
                        'route' => $routeName
                    ];
                } else {
                    $items[] = [
                        'label' => ucwords(str_replace(['-', '_'], ' ', $segment)),
                        'url' => 'javascript: void(0);'
                    ];
                }
            }
        }
        
        return [
            'title' => end($items)['label'] ?? 'Dashboard',
            'items' => $items
        ];
    }
}
