<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Add the quantity column after the second column (user_id, product_id, quantity)
            $table->integer('quantity')->default(1)->after('product_id');
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Drop the quantity column if needed
            $table->dropColumn('quantity');
        });
    }
}