<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable()->default(null);
            $table->string('uri')->nullable();
            $table->text('excerpt')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('thumb')->nullable()->default(null);
            $table->string('seo_title')->nullable()->default(null);
            $table->string('seo_description')->nullable()->default(null);
            $table->string('seo_keywords')->nullable()->default(null);
            $table->integer('menu_order')->nullable()->default(null);
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
        Schema::drop('blog_categories');
    }
}
