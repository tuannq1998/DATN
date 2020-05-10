<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->index();
            $table->biginteger('category_id')->index()->default(0);
            $table->integer('price')->default(0);
            $table->integer('author_id')->default(0)->index();
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('hot')->default(0);
            $table->integer('view')->default(0);
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('desc_seo')->nullable();
            $table->string('Keyword_seo')->nullable();
            $table->longText('contents')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
