<div>
    <div class="container">
        <div class="card shadow" style="width: 100%;">
            <div class="card-body">
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-4">
                        <h4>List des Produits</h4>
                    </div>
                    <div class="col-md-4">
                        @include('../livewire/autocomplet')
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-success" style="right: 0 !important; position:absolute"  data-toggle="modal" data-target="#addProduit">Ajouter nouveau Produit</button>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <th>PR-{{ $produit->id }}</th>
                                <td>{{ $produit->name }}</td>
                                <td>{{ $produit->description }}</td>
                                <td>{{ $produit->prix }}</td>
                                <td>
                                    <button class="btn btn-warning"> Modifier</button>
                                    <button class="btn btn-danger"> Supprimer</button>
                                </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="page-pagination"  style="border: 0px">
                    <ul class="pagination justify-content-center" style="border: 0px">
                        {{$produits->links()}}
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="addProduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('stock.produit.add') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouveau Produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="name">Nom du Produit</label> <br>
                            <input type="text" name="name" id="name" placeholder="Nom du Produit" required>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="description">Description</label> <br>
                            <textarea name="description" id="description" style="width: 100%" cols="30" rows="10" minlength="20" required></textarea>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="unite">Unité</label> <br>
                            <input type="text" name="unite" id="unite" placeholder="ex 1kg, 1L" required>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="prix">Prix</label> <br>
                            <input type="text" name="prix" id="prix" placeholder="Prix en Ar" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
