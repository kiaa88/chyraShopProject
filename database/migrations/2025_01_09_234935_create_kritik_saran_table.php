<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKritikSaranTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kritik_saran', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('pesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kritik_saran');
    }
}
