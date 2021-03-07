<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellcards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('giftcard_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('trx_id');
            $table->decimal('amount',32,2);
            $table->decimal('get_amount',32,2);
            $table->string('currency');
            $table->string('note')->nullable();
            $table->string('comment')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('sellcards');
    }
}
