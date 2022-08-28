<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SayfalarModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "sayfalar";
    protected $fillable = ["baslik", "slug_baslik", "resim", "icerik", "sira", "created_at", "updated_at"];

}
