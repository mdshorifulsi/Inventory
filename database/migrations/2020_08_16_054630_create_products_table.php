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
            $table->string('product_name');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sup_id');
            $table->string('product_code');
            $table->string('product_garage');
            $table->string('product_route');
            $table->string('image');
            $table->string('buy_date');
            $table->string('expire_date');
            $table->string('buying_price');
            $table->string('selling_price');
            $table->string('weight')->nullable();


             $table->foreign('cat_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->foreign('sup_id')
                ->references('id')->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
