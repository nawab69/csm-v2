<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('main_btc',10,8)->default(0);
            $table->decimal('main_ltc',10,8)->default(0);
            $table->decimal('main_doge',16)->default(0);
            $table->bigInteger('main_eth')->default(0);
            $table->decimal('escrow_btc',10,8)->default(0);
            $table->decimal('escrow_ltc',10,8)->default(0);
            $table->decimal('escrow_doge',16)->default(0);
            $table->bigInteger('escrow_eth')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twallets');
    }
}
