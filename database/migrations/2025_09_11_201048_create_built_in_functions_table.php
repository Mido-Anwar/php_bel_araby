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
        Schema::create('built_in_functions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الدالة
            $table->text('description')->nullable(); // وصف اختياري
            $table->foreignId('section_id')
                ->constrained()
                ->onDelete('cascade'); // الدالة مرتبطة بـ Section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('built_in_functions');
    }
};
