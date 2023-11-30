<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('total_area')->nullable();
            $table->string('year')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('rooms')->nullable();
            $table->string('role')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('products');
    }
}
