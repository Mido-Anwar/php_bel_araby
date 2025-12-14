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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('title'); // عنوان البوست
            $table->text('content'); // المحتوى
            $table->string('image')->nullable(); // الصورة
            // ربط البوست باليوزر — العمود قابل للـ NULL، وحذف الكيان الرئيسي يزيل البوست
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');            // ربط البوست باليوزر
            $table->boolean('is_published')->default(false); // حالة النشر
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at (soft delete)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
