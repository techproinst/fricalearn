<?php

use App\Enums\PaymentStatus;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('parents')->onDelete('set null');
            $table->foreignId('student_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('course_level_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('amount_due', 10,2)->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->enum('status', array_column(PaymentStatus::cases(), 'value'))->default(PaymentStatus::Pending->value);
            $table->string('purpose')->nullable();
            $table->text('description')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
