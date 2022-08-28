<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mesajlar extends Migration
{
    public function up()
    {
        Schema::create('mesajlar', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('email');
            $table->string('telefon');
            $table->string('konu');
            $table->longText('mesaj');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mesajlar');
    }
}
