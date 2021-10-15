<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generadors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('birthday');
            $table->string('adress');
            $table->string('email');
            $table->string('phone');
            $table->string('imagen')->nullable();
            
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
        Schema::dropIfExists('generadors');
    }
}
