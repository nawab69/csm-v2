<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['buy','sell']);
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('currency_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('method_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('title');
            $table->string('payment_details')->nullable();
            $table->longText('extra_info')->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('min',32)->default(1);
            $table->decimal('max',32)->default(999999);
            $table->decimal('rate',32)->default(1);
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
        Schema::dropIfExists('offers');
    }
}
