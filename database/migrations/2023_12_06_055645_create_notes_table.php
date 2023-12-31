<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();
            // $table->unsignedBigInteger('post_id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('attachment')->nullable();
            $table->text('body');
            $table->timestamps();


            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete(); // constraint

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
