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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents')->onDelete('set null');
            $table->foreignId('student_id')->constrained('students')->onDelete('set null');
            $table->foreignId('course_level_id')->constrained('course_levels')->onDelete('set null');
            $table->foreignId('payment_id')->constrained('payments')->conDelete('set null');;
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
