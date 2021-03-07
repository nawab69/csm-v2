<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('to_currency');
            $table->foreignId('currency_id')
                ->constrained()
                ->onDelete('cascade');
            $table->decimal('amount',32,2);
            $table->decimal('sell_amount',32,8);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('buys');
    }
}
