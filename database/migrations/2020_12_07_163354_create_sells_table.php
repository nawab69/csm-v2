<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('trx_id');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('from_currency');
            $table->foreignId('currency_id')
                ->constrained()
                ->onDelete('cascade');
            $table->decimal('amount',32,8);
            $table->decimal('sell_amount',32,2);
            $table->string('status')->default('success');
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
        Schema::dropIfExists('sells');
    }
}
