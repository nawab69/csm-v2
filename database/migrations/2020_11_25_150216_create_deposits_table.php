<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('currency_id')
                ->constrained()
                ->onDelete('cascade');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('trx_id')->unique();
            $table->string('bank_name')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('account_no')->nullable();
            $table->string('swift_code')->nullable();
            $table->text('branch_details')->nullable();
            $table->decimal('amount',32,2);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
