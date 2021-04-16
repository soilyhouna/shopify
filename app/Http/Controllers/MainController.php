<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProduitExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    //
    public function ajouterProduit()
    {
        $produit= Produit::create(
            [
                "designation"=>"cahier",
                "description"=>"prix de",
                "prix"=>500
            ]
        );
        dd($produit);
       
    }
    public function ajouterProduit2()
    {
        /*
        $produit=new Produit();
        $produit->designation="kabore";
        $produit->description="description kabore";
        $produit->prix=500;
        $produit->save();
        dd($produit);
        */
/*
        try {

            $produit = Produit::findOrFail(10);
            dd($produit);

        } 

        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            echo"error";
        }

        catch (\Throwable $e) {

           // \Log::error('Erreur inattendue : ', [$e]);

        }
        */
       
    }
    public function updateProduit()
    {
        $produit= Produit::first();
        $produit->designation="first";
        $produit->description="description first";
        $produit->prix=14520;
        $produit->save();
        dd($produit);

    }

    public function updateProduit2()
    {
      $result= Produit::where("id",2)->update([
            "designation"=>"Tree",
            "description"=>"test",
            "prix"=>3500

        ]);
        
        //$produit->save();
        dd($result);

    }
    

    public function supprimerProduit()
    {
       //Produit::destroy(1);
       // dump($result);
       $result=Produit:: where(["designation"=>"cahier"])->get("id");
       Produit::destroy($result);
   
       
    }
    public function supprimerProduit2($id)
    {
        
       Produit::destroy($id);
    }

    public function createCategory()
    {
        # code...
       $cat= Category::create([
            "libelle"=>"blingbling"
        ]);

        $produit= Produit::create(
            [
                "category_id"=>$cat->id,
                "designation"=>"zincata",
                "description"=>"baton description",
                "prix"=>45817
            ]
        );
    }

    public function getProduit(Produit $produit)
    {
        # code...s
       // dd($produit->category);
       //ou
     //  $category=Category::first();
      // dd($category,$category->produits);

    }
    public function commande()
    {
        # code...
       /*
        $user= User::create([
            "name"=>"Issa Ouedraogo",
            "email"=>"issa@gmail.com",
            "password"=>Hash::make("admin"),
        ]);
        */
        $user=User::first();

        $produit1 =Produit::first();
        $produit2 =Produit::findOrFail(2);
        
       // $user->produits()->attach($produit1);
        // $user->produits()->sync($produit1);
       $user->produits()->attach($produit2);
        dd($user->produits);
    }

    public function acceuil()
    {
        # code...
        //get retourne une collection
        $produits=Produit::orderbyDesc("id")->take(9)->get();
        return view("welcome",[
            "produits"=>$produits,
        ]);
    }
    public function collection()
    {
        $collection1=collect([

            [
                "title"=>"livre1",
                "price"=>5000,
                "description"=>"description 1"

            ],
            [
                "title"=>"livre2",
                "price"=>7000,
                "description"=>"description 2"
            ],
            [
                "title"=>"livre3",
                "price"=>3000,
                "description"=>"description 3"
            ]
        ]
            
        );
       // dd($collection1);
       // dd($collection1->where("price",">",5000));
       // dd($collection1->avg("price"));
        $collection1->push(
            [
                "title"=>"livre4",
                "price"=>30000,
                "description"=>"description 4"
            ]
        );

       // dd($collection1->sortBy("price"));
        $nouvelleCollect=$collection1->filter(function($livre,$key)
        {
            return $livre["price"] >= 10000;
        });
        dd($nouvelleCollect);
    }

    public function exportProduit()
    {
        return Excel::download(new ProduitExport, "produits.xlsx");
    }
    
}
