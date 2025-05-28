<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('payments', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method');
            $table->decimal('amount', 15, 2);
            $table->enum('status', ['pending','paid','failed'])->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('payments');
    }
};
