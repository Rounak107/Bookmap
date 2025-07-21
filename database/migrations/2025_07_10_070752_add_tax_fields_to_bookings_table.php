<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->decimal('tax_percentage', 5, 2)->default(18.00);
        $table->decimal('tax_amount', 10, 2)->default(0);
        $table->decimal('grand_total', 10, 2)->default(0);
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['tax_percentage', 'tax_amount', 'grand_total']);
    });
}
};
