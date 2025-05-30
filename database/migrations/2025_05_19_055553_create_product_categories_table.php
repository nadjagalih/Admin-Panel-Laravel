<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('product_category', function(Blueprint $table){
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->primary(['product_id', 'category_id']);
        });
    }
    public function down(){
        Schema::dropIfExists('product_category');
    }
};