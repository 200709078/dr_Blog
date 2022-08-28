<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategorilerModel extends Model
{
    use HasFactory;
    protected $table="kategoriler";
    protected $fillable=["name","slug","created_at","updated_at"];
    public function makaleSay(){
        return $this->hasMany('App\Models\MakalelerModel','kategori_id','id')->count();
    }
}
