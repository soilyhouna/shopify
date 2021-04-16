<?php

namespace App\Exports;

use App\Models\Produit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduitExport implements /*FromCollection*/ FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   /* public function collection()
    {
        return Produit::all();//export form view est tn autre cas avec la methode view
    }
    */

    public function view(): View
    {
        return view('partials._list-produit', [
            'produits' => Produit::all()//ou Produit::where("prix",">",5000)->get()
        ]);
    }
}
