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
            $table->enum('continent', array_column(ContinentSchedule::cases(), 'value'));
            $table->enum('day', array_column(DayOfWeek::cases(), 'value'));
          //  $table->date('date');
            $table->time('morning');
            $table->time('afternoon');
            $table->timestamps();

            $table->unique(['course_id', 'continent', 'day']);
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
