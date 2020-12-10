<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('commentaire');
            $table->dateTime('date_com')->default((new \DateTime())->format('Y-m-d'));
            $table->integer('note')->default(0)->nullable(true);
            $table->unsignedBigInteger('jeu_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('jeu_id')->references('id')->on('jeux')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            //            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
