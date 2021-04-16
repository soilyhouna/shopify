<x-master-layout>

    <div class="container">
     

    <div class="row">
        <div class="col-md-12 mt-4">
            
                <h1 class="text-center">Ajouter un produit</h1>
                <hr/>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            
            {{--enctype="multipart/form-data" to send data by form--}}
            

         <form method="post" action="{{route('produits.store')}}" enctype="multipart/form-data">
            @method('POST')
            @include('partials._produit-form')

            

         </form>
        </div>
    </div>

</div>
   
</x-master-layout>