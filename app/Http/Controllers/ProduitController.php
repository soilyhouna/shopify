<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use App\Mail\ProduitAjoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ProduitModifie;
use App\Http\Requests\ProduitFormRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $produits=Produit::all();
       /*
        $produit1000=Produit:: where(["prix"=>1000,"designation"=>"livre"])->get();
        dump($produit1000);
        */
/*
        $produit=new Produit();
        $produit->designation="livre";
        $produit->description="description livre";
        $produit->prix=1000;
        $produit->save();
        */


      //  $produit=Produit::find(1);
      //  $produit=Produit::first();
       // dump($produit);
       $produits=Produit::orderbyDesc("id")->paginate();

      // $produits=Produit::paginate(5);
        return view("front-office.produit.index", [
            "produits"=>$produits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $produit=new Produit;
        return view("front-office.produit.create",
    [
        "categories"=>$categories,
        "produit"=>$produit
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Request*/ ProduitFormRequest $request)
    {
        /*
        $request->validate([
            "designation" =>"required|min:2|max:10|unique:produits",
            "prix" =>"required|numeric|between:200,80000",
            "description" =>"required|max:50",
            "category_id" =>"required|numeric"
            
        ]);
*/
//ProduitFormRequest gererer les regles de validation du produit

       // dd($request->file("image"));
        $imageName="produit.png";
            if($request->file("image"))
            {
                $imageName=time().$request->file("image")->getClientOriginalName();
               //stockage du fichier
                $request->file("image")->storeAs("public/uploads/produits",$imageName);
                //storage-app
            }
        $request->session()->put("imageName",$imageName);
       /*
        session([
            "imageName"=>$imageName,
            //cle -valeur
        ]);
        */
      $prod=  Produit::create([
            "designation"=>$request->designation,
            "prix"=>$request->prix,
            "category_id"=>$request->category_id,
            "description"=>$request->description,
            "image"=>$imageName,
        ]);
        //dd($request->designation);

        $user=User::first();
        if($user){
            Mail::to($user)->send(new ProduitAjoute);
        }
        
        return redirect()->route('produits.index')->with("statutProduit","Le produit a bien ete ajoutée");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=Category::all();
        $produit=Produit::find($id);
        return view("front-office.produit.show",
    [
        "categories"=>$categories,
        "produit"=>$produit
    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //model binding
        $categories=Category::all();
       
        return view("front-office.produit.edit",
        [
            "produit"=>$produit,
            "categories"=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(/*Request */ ProduitFormRequest $request, $id)
    {
        /*
        $request->validate([
            "designation" =>"required|min:2|max:10|unique:produits,designation,".$id,
            "prix" =>"required|numeric|between:200,80000",
            "description" =>"required|max:50",
            "category_id" =>"required|numeric"
            
        ]);
        */
       

        //modifier un produit
        Produit::where("id",$id)->update(
            [
                "designation"=>$request->designation,
                "prix"=>$request->prix,
                "category_id"=>$request->category_id,
                "description"=>$request->description
            ]
            );

            $user=User::first();
            if($user){
                $user->notify(new ProduitModifie);
            }

            return redirect()->route('produits.index')->with("statutProduit","Le produit a bien ete modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index')->with("statutProduit","Le produit a bien ete supprimée");;
    }
}
