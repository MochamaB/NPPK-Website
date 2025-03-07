<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WidgetType extends Model
{
    protected $fillable = [
        'name',
        'component',
        'description',
        'schema',
        'is_active'
    ];

    protected $casts = [
        'schema' => 'array',
        'is_active' => 'boolean'
    ];

    public function widgets()
    {
        return $this->hasMany(Widget::class);
    }

    // Helper method to validate widget data against schema
    public function validateData(array $data): bool
    {
        // Here we can implement JSON schema validation
        // For now, we'll just check if required fields exist
        $schema = $this->schema;
        
        if (isset($schema['required'])) {
            foreach ($schema['required'] as $required) {
                if (!isset($data[$required])) {
                    return false;
                }
            }
        }

        return true;
    }
}
