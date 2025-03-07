<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetTypesTable extends Migration
{
    public function up()
    {
        Schema::create('widget_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // e.g., 'slider', 'breadcrumb'
            $table->string('component');     // Blade component path e.g., 'components.widgets.slider'
            $table->text('description')->nullable();
            $table->json('schema');          // JSON schema defining required data structure
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('widget_types');
    }
}
