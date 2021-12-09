<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('body')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->string('excerpt');
            $table->string('slug')->unique();
            $table->foreignId('admin_id')->constrained('admins')
                ->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('posts');
    }
}
