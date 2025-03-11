<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Page;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'parent_id',
        'page_id',
        'title',
        'url',
        'target',
        'section_id',
        'order_index',
        'css_class',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order_index');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the URL for this menu item
     * 
     * @return string
     */
    public function getFullUrl()
    {
        if ($this->url) {
            return $this->url; // Return external URL if set
        }

        if ($this->page_id) {
            $url = route('page.show', $this->page->slug);
            
            // If this is a section link, append the section ID
            if ($this->section_id) {
                $url .= '#' . $this->section_id;
            }
            
            return $url;
        }

        return '#'; // Fallback
    }

    /**
     * Check if this menu item is active based on the current URL
     * 
     * @return boolean
     */
    public function isActive()
    {
        $currentUrl = url()->current();
        $itemUrl = $this->getFullUrl();
        
        // If this is an exact match
        if ($currentUrl === $itemUrl) {
            return true;
        }
        
        // If this is a parent item and we're on a child page
        if ($this->children->count() > 0) {
            foreach ($this->children as $child) {
                if ($child->isActive()) {
                    return true;
                }
            }
        }
        
        return false;
    }
}
