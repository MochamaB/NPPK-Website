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

        return view($this->widgetType->component, $this->data);
    }
}
