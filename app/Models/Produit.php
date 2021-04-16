<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    //add directly on database
    public $fillable=["designation","description","prix","category_id","image"];

    public function Category()
    {
        # code...produit appartient a une category
        return $this->belongsTo(Category::class);
    }
    public function users()
    {
        # code...
        return $this->belongsToMany(User::class);
    }

}
