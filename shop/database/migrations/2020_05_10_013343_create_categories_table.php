<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->char('icon')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('total_product')->default(0);
            $table->string('keyword_seo')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->string('title_seo')->nullable();
            $table->string('desc_seo')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
