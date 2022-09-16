<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ayarlar extends Migration
{
    public function up()
    {
        Schema::create('ayarlar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('logo');
            $table->string('favicon');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('whatsapp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ayarlar');
    }
}
