<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $fillable = [
        'widget_type_id',
        'name',
        'data',
        'order',
        'is_active'
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean'
    ];

    public function widgetType()
    {
        return $this->belongsTo(WidgetType::class);
    }

    // Helper method to render the widget
    public function render()
    {
        if (!$this->is_active) {
            return '';
        }

        // For slider widget specifically
        if ($this->widgetType->component === 'components.widgets.slider' && isset($this->data['slides'])) {
            return view($this->widgetType->component, ['slides' => $this->data['slides']]);
        }

        // For what-we-do widget specifically
        if ($this->widgetType->component === 'components.widgets.what-we-do' && isset($this->data['items'])) {
            return view($this->widgetType->component, [
                'title' => $this->data['title'],
                'description' => $this->data['description'] ?? null,
                'items' => $this->data['items']
            ]);
        }

        // For counter-stats widget specifically
        if ($this->widgetType->component === 'components.widgets.counter-stats' && isset($this->data['stats'])) {
            return view($this->widgetType->component, [
                'title' => $this->data['title'] ?? null,
                'description' => $this->data['description'] ?? null,
                'stats' => $this->data['stats']
            ]);
        }

        // For team-showcase widget specifically
        if ($this->widgetType->component === 'components.widgets.team-showcase' && isset($this->data['members'])) {
            return view($this->widgetType->component, [
                'title' => $this->data['title'] ?? null,
                'description' => $this->data['description'] ?? null,
                'members' => $this->data['members']
            ]);
        }

        // For magazine widget specifically
        if ($this->widgetType->component === 'components.widgets.magazine') {
            return view($this->widgetType->component, [
                'data' => [
                    'campaign_news' => $this->data['campaign_news'] ?? [],
                    'campaign_news_link' => $this->data['campaign_news_link'] ?? '#',
                    'magazine_articles' => $this->data['magazine_articles'] ?? [],
                    'magazine_link' => $this->data['magazine_link'] ?? '#'
                ]
            ]);
        }

        return view($this->widgetType->component, $this->data);
    }
}
