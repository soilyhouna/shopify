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
      @foreach ($produits as $produit)
      <tr>
          <td scope="row">{{$produit->designation}}</td>
          <td>{{$produit->category ? $produit->category->libelle :"non categorisé"}}</td>
          <td>{{formatPrixBf($produit->prix)}}</td>
          <td>{{$produit->description}}</td>
          
          </tr>

      @endforeach
     
  </tbody>
</table>