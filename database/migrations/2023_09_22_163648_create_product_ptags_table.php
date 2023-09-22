<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ptags', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ptag_id');

            $table->index('product_id', 'ptag_product_idx');
            $table->index('ptag_id', 'ptag_ptag_idx');

            $table->foreign('product_id', 'ptag_product_fk')->on('products')->references('id');
            $table->foreign('ptag_id', 'ptag_ptag_fk')->on('ptags')->references('id');

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
        Schema::dropIfExists('product_ptags');
    }
}
