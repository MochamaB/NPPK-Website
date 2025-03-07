<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('widget_type_id')->constrained('widget_types')->onDelete('cascade');
            $table->string('name');              // User-friendly name for the widget instance
            $table->json('data');                // Actual widget data following the type's schema
            $table->integer('order')->default(0); // Order within a page
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
