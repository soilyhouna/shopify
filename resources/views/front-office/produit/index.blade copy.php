<x-master-layout>

    <div class="container">

    
  
    {{--  @dump($produits); --}} 
     

    <div class="row">
        <div class="col-md-12 mt-4">
            
                <h1 class="text-center">Tous nos produits</h1>
                <hr/>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            @if(session("statutProduit"))
                
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                 {{session("statutProduit")}}
              </div>
              
              <script>
                $(".alert").alert();
                $(document).ready(function () {
                    
                    window.setTimeout(function() {
                        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                            $(this).remove(); 
                        });
                    }, 5000);
                    
                    });
              </script>
            @endif

            <div>
                <a class="btn btn-success btn-sm" href="{{route('produits.create')}}"><i class="fas fa-plus"></i>Ajouter</a>
                <a class="btn btn-primary btn-sm" href="{{route('export')}}"><i class="fas fa-download"></i>Exporter</a>           
            </div>

     
 {{--le nom de l'image est :{{session('imageName')}} --}}

          
            <table class="table table-bordered table-striped">
                <thead>
                    <div ></div>
                    <tr>
                        <th>Designation</th>
                        <th>Category</th>
                        <th>prix</th>
                        <th>Desciption</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                    <tr>
                        <td scope="row">{{$produit->designation}}</td>
                        <td>{{$produit->category ? $produit->category->libelle :"non categorisé"}}</td>
                        <td>{{formatPrixBf($produit->prix)}}</td>
                        <td>{{$produit->description}}</td>
                        <td class="d-flex">
                            <a href="{{ route('produits.edit', $produit) }}" class="btn btn-primary btn-sm mr-2" ><i class="fas fa-edit"></i></a>
                            <a href="{{ route("produits.destroy", $produit->id) }}" class="btn btn-danger btn-sm"  onClick="
                                event.preventDefault(); 
                                if(confirm('Etes-vous sur de vouloir supprimer cet produit ?')) 
                                document.getElementById('{{ $produit->id }}').submit();" ><i class="fas fa-trash"></i></a>
                            <form id="{{ $produit->id }}" method="post" action="{{ route("produits.destroy", $produit->id) }}">
                                @csrf
                                @method("delete")
                            </form>

                            {{--add list--}}
                            <a href="{{ route('produits.show', $produit) }}" class="btn btn-primary btn-sm mr-2" ><i class="fas fa-list"></i></a>
                            </td>
                        </tr>
        
                    @endforeach
                   
                </tbody>
            </table>
            {{-- pagination de la liste --}} 
            <div class="mt-5 d-flex justify-content-center">
            {{$produits->links()}}

            </div>
        
        </div>
    </div>

</div>
   
</x-master-layout>