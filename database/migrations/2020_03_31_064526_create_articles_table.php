<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content_html')->nullable();
            $table->text('content_json')->nullable();
            $table->text('content_text')->nullable();
            $table->enum('status', [
                'DRAFT', // draft article
                'PUBLISH' // publish article
            ])->default('DRAFT');
            $table->index(['slug']);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
