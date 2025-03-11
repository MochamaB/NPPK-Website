<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageWidgetTable extends Migration
{
    public function up()
    {
        Schema::create('page_widget', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->foreignId('widget_id')->constrained('widgets')->onDelete('cascade');
            $table->string('section')->default('main'); // For placing widgets in different page sections (e.g., header, main, sidebar, footer)
            $table->integer('order')->default(0); // Order within the section
            $table->timestamps();
            
            // Ensure a widget can only be placed once in a specific section of a page
            $table->unique(['page_id', 'widget_id', 'section']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_widget');
    }
}
