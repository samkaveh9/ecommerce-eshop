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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('product_name')->unique();
            $table->string('slug');
            $table->bigInteger('code')->unique();
            $table->bigInteger('quantity');
            $table->string('size');
            $table->string('color');
            $table->text('detail');
            $table->text('images');
            $table->bigInteger('selling_price');
            $table->bigInteger('discount_price')->nullable();
            $table->boolean('special_offers')->default(0);
            $table->boolean('main_slider')->default(0);
            $table->boolean('mid_slider')->default(0);
            $table->boolean('amazing_offer')->default(0);
            $table->boolean('best_sellers')->default(0);
            $table->boolean('selected_products')->default(0);
            $table->boolean('most_visited')->default(0);
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
