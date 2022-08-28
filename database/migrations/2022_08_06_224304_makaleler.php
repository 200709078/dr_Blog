<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Makaleler extends Migration
{
    public function up()
    {
        Schema::create('makaleler', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('baslik');
            $table->string('slug_baslik');
            $table->longText('makale');
            $table->string('yazar');
            $table->integer('tiklanma')->default(0);
            $table->integer('durum')->default(0)->comment('0:pasif 1:aktif');
            $table->string('resim');
            $table->softDeletes();
            $table->timestamps();

            @$table->foreign('kategori_id')
                ->references('id')
                ->on('kategoriler')
                ->onDelete('cascade');

        });
    }
    public function down()
    {
        Schema::dropIfExists('makaleler');
    }
}
