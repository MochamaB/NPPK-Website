<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('title')->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::orderBy('title')->get();
        $templates = $this->getAvailableTemplates();
        return view('admin.pages.create', compact('pages', 'templates'));
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages',
            'description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'show_in_menu' => 'boolean',
            'parent_id' => 'nullable|exists:pages,id',
            'template' => 'required|string|max:100',
            'content' => 'nullable|string',
            'order_index' => 'nullable|integer',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set default values for checkboxes if not present
        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_menu'] = $request->has('show_in_menu');

        $page = Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $pages = Page::where('id', '!=', $page->id)->orderBy('title')->get();
        $templates = $this->getAvailableTemplates();
        return view('admin.pages.edit', compact('page', 'pages', 'templates'));
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('pages')->ignore($page->id),
            ],
            'description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'show_in_menu' => 'boolean',
            'parent_id' => [
                'nullable',
                'exists:pages,id',
                function ($attribute, $value, $fail) use ($page) {
                    if ($value == $page->id) {
                        $fail('A page cannot be its own parent.');
                    }
                },
            ],
            'template' => 'required|string|max:100',
            'content' => 'nullable|string',
            'order_index' => 'nullable|integer',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set default values for checkboxes if not present
        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_menu'] = $request->has('show_in_menu');

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        // Check if page has children
        if ($page->children()->count() > 0) {
            return redirect()->route('admin.pages.index')
                ->with('error', 'Cannot delete page with child pages. Please delete or reassign child pages first.');
        }

        // Check if page has menu items
        if ($page->menuItems()->count() > 0) {
            return redirect()->route('admin.pages.index')
                ->with('error', 'Cannot delete page that is used in menus. Please remove from menus first.');
        }

        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    /**
     * Get available page templates from the resources/views/templates directory
     *
     * @return array
     */
    private function getAvailableTemplates()
    {
        $templates = [
            'default' => 'Default Template',
            'home' => 'Home Page',
            'about' => 'About Page',
            'contact' => 'Contact Page',
            'sidebar-left' => 'Left Sidebar',
            'sidebar-right' => 'Right Sidebar',
            'full-width' => 'Full Width'
        ];

        return $templates;
    }
}
