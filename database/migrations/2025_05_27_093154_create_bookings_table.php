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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
         $table->unsignedBigInteger('service_id');
        $table->string('service_name');
        $table->integer('quantity');
        $table->decimal('total_price', 10, 2);
        $table->date('booking_date');
        $table->string('payment_method')->default('Cash on Service');
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
