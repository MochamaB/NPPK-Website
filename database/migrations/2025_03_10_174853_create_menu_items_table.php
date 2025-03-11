<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('set null');
            $table->foreignId('page_id')->nullable()->constrained('pages')->onDelete('set null');
            $table->string('title');
            $table->string('url')->nullable(); // For external links
            $table->string('target', 50)->nullable(); // '_blank', '_self', etc.
            $table->string('section_id')->nullable(); // For page section links (scrolling)
            $table->integer('order_index')->default(0);
            $table->string('css_class')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
