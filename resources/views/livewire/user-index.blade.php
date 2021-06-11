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
                        <button class="btn btn-success" style="right: 0 !important; position:absolute"  data-toggle="modal" data-target="#addUser">Nouvelle Utilisateur</button>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom Utilisateur</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Supermarket Administrer</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>USER-{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @switch($user->role)
                                        @case("1")
                                            Administrateur
                                            @break
                                        @case("2")
                                            Superviseur
                                            @break
                                        @case("3")
                                            Vendeur(euse)
                                            @break
                                        @default

                                    @endswitch
                                </td>
                                <td> @switch($user->role)
                                    @case("1")
                                        Tous
                                        @break
                                    @case("2")
                                        <ul>
                                            @foreach( $user->shop as $shop)
                                                <li>{{ $shop->shop->name." ".$shop->shop->location }}</li>
                                            @endforeach
                                        </ul>
                                        @break
                                    @case("3")
                                        {{ $user->shop->first()->shop->name." ".$user->shop->first()->shop->location }}
                                        @break
                                    @default

                                @endswitch</td>
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
                        {{$users->links()}}
                    </ul>
                </div>
            </div>
        </div>


    </div>
    <style>
        input{
            width:100% !important;
        }
        input::placeholder{
            font-family: segouil;
            font-size: 100;
        }
    </style>
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('settings.user.add') }}" method="post">
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
                            <label for="name">Nom utilisateur</label> <br>
                            <input type="text" name="name" id="name" placeholder="Nom utilisateur" required>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="email">Adresse email</label> <br>
                            <input type="email" name="email" id="email" placeholder="Adresse email" required>
                        </div>
                        <div>
                            <label for="role">Adresse email</label> <br>
                            <select class="custom-select" id="role" name="role">
                                <option value="1">Administrateur</option>
                                <option value="2">Superviseur</option>
                                <option value="3">Vendeur(euse)</option>
                            </select>
                        </div>
                        <div id="ifSuperviseur" >
                            <label for="role">Shop</label> <br>
                            <select class="custom-select ifSuperviseurShop" style="width: 100%" id="shop_superviseur" name="shop_superviseur[]" multiple="multiple" >
                                @foreach ($shops as $shop )
                                    <option value="{{ $shop->id }}">{{ $shop->name }} &nbsp; {{ $shop->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="ifVendeur">
                            <label for="role">Shop</label> <br>
                            <select class="custom-select" id="shop_vendeur" name="shop_vendeur" >
                                @foreach ($shops as $shop )
                                    <option value="{{ $shop->id }}">{{ $shop->name }} &nbsp; {{ $shop->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="password">Mot de passe</label> <br>
                            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
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
    <script>
        $(document).ready(function() {
            $('.ifSuperviseurShop').select2();
        });
        $(function () {
            $("#role").change(function() {
              var val = $(this).val();
              if(val === "1") {
                  $("#ifSuperviseur").hide();
                  $("shop_vendeur").prop('required',false);
                  $("shop_superviseur").prop('shop_superviseur',false);
                  $("#ifVendeur").hide();
              }
              else if(val === "2") {
                  $("#ifSuperviseur").show();
                  $("#ifVendeur").hide();
                  $("shop_vendeur").prop('required',false);
                  $("shop_superviseur").prop('shop_superviseur',true);
              }else if(val === "3"){
                $("#ifVendeur").show();
                $("#ifSuperviseur").hide();
                $("shop_vendeur").prop('required',true);
                $("shop_superviseur").prop('shop_superviseur',false);
              }
            });
          });
          $('#addUser').on('shown.bs.modal', function (e) {
            var val = $("#role").val();
            if(val === "1") {
                $("#ifSuperviseur").hide();
                $("shop_vendeur").prop('required',false);
                $("shop_superviseur").prop('shop_superviseur',false);
                $("#ifVendeur").hide();
            }
            else if(val === "2") {
                $("#ifSuperviseur").show();
                $("#ifVendeur").hide();
                $("shop_vendeur").prop('required',false);
                $("shop_superviseur").prop('shop_superviseur',true);
            }else if(val === "3"){
              $("#ifVendeur").show();
              $("#ifSuperviseur").hide();
              $("shop_vendeur").prop('required',true);
              $("shop_superviseur").prop('shop_superviseur',false);
            }
          })
    </script>
</div>
