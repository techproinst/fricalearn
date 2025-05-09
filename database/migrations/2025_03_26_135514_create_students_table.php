<?php

use App\Enums\AgeRange;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents')->onDelete('cascade');
            $table->foreignId('timezone_group_id')->constrained('timezone_groups')->cascadeOnDelete();
            $table->string('name');
            $table->string('birthday');
            $table->string('app_no')->nullable();
            $table->enum('age_range', array_column(AgeRange::cases(), 'value'))->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
