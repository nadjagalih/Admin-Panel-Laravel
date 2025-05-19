<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('shipping_addresses', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('recipient_name');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone_number');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('shipping_addresses');
    }
};
