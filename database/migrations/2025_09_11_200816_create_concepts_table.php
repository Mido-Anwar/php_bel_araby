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
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('section_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');

            $table->enum('type', ['concept', 'function'])->default('concept');

            $table->text('syntax')->nullable();
            $table->string('return_type')->nullable();

            $table->timestamps();

            $table->index(['section_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepts');
    }
};
