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
           Schema::table('technologies', function (Blueprint $table) {
            $table->index('name'); // index للبحث السريع بالاسم
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->index('technology_id'); // index على الـ FK
        });

        Schema::table('concepts', function (Blueprint $table) {
            $table->index('section_id'); // index على الـ FK
        });

        Schema::table('built_in_functions', function (Blueprint $table) {
            $table->index('section_id'); // index على الـ FK
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropIndex(['name']);
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropIndex(['technology_id']);
        });

        Schema::table('concepts', function (Blueprint $table) {
            $table->dropIndex(['section_id']);
        });

        Schema::table('built_in_functions', function (Blueprint $table) {
            $table->dropIndex(['section_id']);
        });
    }
};
