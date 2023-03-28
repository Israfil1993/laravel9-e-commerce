<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title',100);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image',)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->double('price')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('minquantity')->default(5);
            $table->integer('tax')->default(18);
            $table->text('detail')->nullable();
            $table->string('slug',100)->nullable();
            $table->boolean('status')->nullable()->default('0');
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
};
