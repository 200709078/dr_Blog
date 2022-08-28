<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MakalelerModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "makaleler";
    protected $fillable = ["kategori_id", "baslik", "slug_baslik", "makale", "yazar", "tiklanma", "resim", "created_at", "updated_at"];

    public function getKategori()
    {
        return $this->hasOne('App\Models\KategorilerModel', 'id', 'kategori_id');
    }
}
