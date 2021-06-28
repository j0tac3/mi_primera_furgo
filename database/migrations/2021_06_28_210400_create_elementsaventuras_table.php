<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsaventurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementsaventuras', function (Blueprint $table) {
            $table->id();
            $table->string('element');
            $table->string('value');

            $table->unsignedBigInteger('aventura_id');
            $table->foreign('aventura_id')
                    ->references('id')
                    ->on('aventuras')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('elementsaventuras');
    }
}
