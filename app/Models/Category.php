<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public $fillable=["libelle"];

    public function produits()
    {
        //relation de plusieurs: une category contient +sieurs produits
        return $this->hasMany(Produit::class);
    }
}
