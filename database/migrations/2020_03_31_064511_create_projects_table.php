<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('media_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('link_source')->nullable();
            $table->string('link_live')->nullable(); // for web
            $table->string('link_doc')->nullable(); // documentation link
            $table->string('featured_image')->nullable(); // will remove letter
            $table->text('link_store')->nullable()->comment("for mobile app-store or g-play [['type' => 'type', 'link' => 'link']]");
            $table->enum('type', [
                'MOBILE', // drafted project | not showing on front-office
                'WEB' // published project | showing on front-office
            ])->default('MOBILE');
            $table->enum('status', [
                'DRAFT', // drafted project | not showing on front-office
                'PUBLISH' // published project | showing on front-office
            ])->default('DRAFT');
            $table->enum('visibility', [
                'PRIVATE', // drafted project | not showing on front-office
                'PUBLIC' // published project | showing on front-office
            ])->default('PUBLIC');
            $table->index(['slug']);
            $table->softDeletes();
            $table->timestamps();
            //$table->foreign('media_id')
            //    ->references('id')
            //    ->on('media')
            //    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
