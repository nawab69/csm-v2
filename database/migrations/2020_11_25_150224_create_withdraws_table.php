<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('currency_id')
                ->constrained()
                ->onDelete('cascade');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('trx_id')->unique();
            $table->foreignId('bank_id')->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->decimal('amount',32,2);
            $table->decimal('fee',32,2);
            $table->decimal('total',32,2);
            $table->text('note');
            $table->string('status');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('withdraws');
    }
}
