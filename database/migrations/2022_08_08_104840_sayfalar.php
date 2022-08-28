<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sayfalar extends Migration
{
    public function up()
    {
        Schema::create('sayfalar', function (Blueprint $table) {
            $table->id();
            $table->string('baslik');
            $table->string('slug_baslik');
            $table->string('resim');
            $table->longText('icerik');
            $table->integer('sira')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sayfalar');
    }
}
