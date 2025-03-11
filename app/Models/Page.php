<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_keywords',
        'meta_description',
        'is_active',
        'show_in_menu',
        'menu_order',
        'parent_id',
        'template',
        'content',
        'order_index'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean'
    ];

    // Auto-generate slug from title if not provided
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    // Relationships
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id')->orderBy('order_index');
    }

    public function widgets()
    {
        return $this->belongsToMany(Widget::class, 'page_widget')
                    ->withPivot('section', 'order')
                    ->orderBy('page_widget.section')
                    ->orderBy('page_widget.order')
                    ->withTimestamps();
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    // Get widgets for a specific section
    public function getWidgetsBySection($section = 'main')
    {
        return $this->widgets()
                    ->wherePivot('section', $section)
                    ->orderBy('page_widget.order')
                    ->get();
    }

    // Render all widgets in a specific section
    public function renderSection($section = 'main')
    {
        $widgets = $this->getWidgetsBySection($section);
        $output = '';
        
        foreach ($widgets as $widget) {
            $output .= $widget->render();
        }
        
        return $output;
    }

    // Get active menu items
    public static function getMenuItems()
    {
        return self::where('is_active', true)
                   ->where('show_in_menu', true)
                   ->orderBy('menu_order')
                   ->get();
    }

    // Get menu structure with parent-child relationships
    public static function getMenuStructure()
    {
        $pages = self::where('is_active', true)
                     ->orderBy('order_index')
                     ->get();
        
        // Group pages by parent_id
        $pagesByParent = $pages->groupBy('parent_id');
        
        // Start with top-level pages (null parent_id)
        $menuStructure = $pagesByParent->get(null, new Collection());
        
        // Add children to each page
        foreach ($menuStructure as $page) {
            $page->childPages = $pagesByParent->get($page->id, new Collection());
        }
        
        return $menuStructure;
    }
}
