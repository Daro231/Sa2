<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('email')->after('full_name');
            $table->string('city')->after('street_address2');
            $table->string('state')->after('city');
            $table->text('notes')->nullable()->after('phone_number');
            $table->decimal('subtotal', 10, 2)->after('notes');
            $table->decimal('shipping', 10, 2)->after('subtotal');
            $table->decimal('tax', 10, 2)->after('shipping');
            $table->timestamp('paid_at')->nullable()->after('payment_status');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('subtotal', 10, 2)->after('quantity');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['email', 'city', 'state', 'notes', 'subtotal', 'shipping', 'tax', 'paid_at']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('subtotal');
        });
    }
};