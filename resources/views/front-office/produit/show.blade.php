<x-master-layout>

    <div class="container">
     

    <div class="row">
        <div class="col-md-12 mt-4">
            
                <h1 class="text-center">Afficher un produit</h1>
                <hr/>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
         
            
         {{--@include('partials._produit-list-form')--}} 
         <table class="table table-bordered table-striped">
         <thead>
           <div ></div>
           <tr>
               <th>Designation</th>
               <th>Category</th>
               <th>prix</th>
               <th>Desciption</th>
               
           </tr>
         </thead>
         <tbody>
          
           <tr>
               <td scope="row">{{$produit->designation}}</td>
               <td>{{$produit->category ? $produit->category->libelle :"non categorisé"}}</td>
               <td>{{formatPrixBf($produit->prix)}}</td>
               <td>{{$produit->description}}</td>
              
           </tr>

         </tbody>
        </table>
        <a href="{{ route('produits.index') }}" class="btn btn-primary btn-sm mr-2" >retour</a>
        
        </div>
    </div>

</div>
   
</x-master-layout>