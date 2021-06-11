<div>
    <div class="container">
        <div class="row" style="margin-bottom: 2%">
            <div class="col-md-4">
                <h4>{{ $shops->name }} &nbsp {{ $shops->location }}</h4>
            </div>
            <div class="col-md-4">

            </div>

            <div class="col-md-4">

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('../livewire/autocomplet')
                    <table class="table table-hover" style="margin-top: 2%">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Name</th>
                            {{--  <th scope="col">Stock</th>  --}}
                            <th scope="col">Prix U</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr class="text-center">
                                    <td>{{ $produit->name }}</td>
                                    {{--  <td>{{ $produit->shop->where('shop_id','=','1')->first()->stock }}</td>  --}}
                                    <td>{{ $produit->prix }}</td>
                                    <td>
                                        {{--  @if($produit->shop->where('shop_id','=','1')->first()->stock > 0  )  --}}
                                        <button class="btn btn-success" wire:click="addtoCart({{ $produit->id }})" > <i class="bi-cart-plus-fill"></i></button>
                                        {{--  @else  --}}
                                            {{--  <p class="test-danger"> Stock épuisé</p>  --}}
                                        {{--  @endif  --}}
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
                <div class="col-md-6">
                    <h5>Mon panier</h5>
                    <table class="table table-hover" style="margin-top: 3%">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Name</th>
                            <th scope="col">Prix U</th>
                            <th scope="col" style="width: 100px">Quantiter</th>
                            <th scope="col">Prix Total</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($carts)
                                @foreach ($carts as $cart)
                                    <tr class="text-center">
                                        @php
                                            $produit = App\Models\produit::findOrfail($cart["produit"]);
                                        @endphp
                                        <th>{{ $produit->name }}</th>
                                        <td>{{ $produit->prix }}</td>
                                        <td> <a wire:click="decrementQuatiter({{ $produit->id }})"> <i class="bi-dash-square"></i> </a> &nbsp {{ $cart["quantiter"] }} &nbsp <a  wire:click="incremetQuatiter({{ $produit->id }})"><i class="bi-plus-square"></i></a></td>
                                        <td>{{ $cart["prix_total"] }}</td>
                                        <td>
                                            <button class="btn btn-danger" wire:click="deleteToCart({{ $produit->id }})"> <i class="bi-trash-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Montant Total</th>
                            <th scope="col">{{ $montant_total }}</th>
                        </tfoot>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <button class="btn btn-danger" wire:click="annulerAchat()" style="color:white;"> Vider le pannier </button>
                            @if(!empty($carts))
                                <button class="btn btn-warning" wire:click="valideAchat()" style="color:white;"> Valider l'achat </button>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
