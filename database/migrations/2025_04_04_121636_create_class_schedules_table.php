<?php

use App\Enums\ContinentSchedule;
use App\Enums\DayOfWeek;
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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('course_level_id')->constrained('course_levels')->cascadeOnDelete();
            $table->foreignId('timezone_group_id')->constrained('timezone_groups')->cascadeOnDelete();
          //  $table->enum('continent', array_column(ContinentSchedule::cases(), 'value'));
            $table->enum('day', array_column(DayOfWeek::cases(), 'value'));
          //  $table->date('date');
            $table->time('morning_time');
            $table->time('afternoon_time');
            $table->string('morning_link')->nullable();
            $table->string('afternoon_link')->nullable();
            $table->timestamps();

            $table->unique(['course_id',  'day', 'timezone_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
