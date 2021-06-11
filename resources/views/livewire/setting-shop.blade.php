<div>
    <div class="container">
        <div class="row" style="margin-bottom: 2%">
            <div class="col-md-4">
                <h4>List des Supermarcher</h4>
            </div>
            <div class="col-md-4">
                @include('../livewire/autocomplet')
            </div>

            <div class="col-md-4">
                <button class="btn btn-success" style="right: 0 !important; position:absolute"  data-toggle="modal" data-target="#addShop">Nouvelle supermarcher</button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom du supermarcher</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                    <tr>
                        <th>PR-{{ $shop->id }}</th>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->location }}</td>
                        <td>
                            <button class="btn btn-warning"> Modifier</button>
                            <button class="btn btn-danger"> Supprimer</button>
                        </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
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
    <div class="modal fade" id="addShop" tabindex="-1" role="dialog" aria-labelledby="addShop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('settings.shop.add') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addShop">Nouvelle Supermarcher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="name">Nom du supermarcher</label> <br>
                            <input type="text" name="name" id="name" placeholder="Nom du supermarcher" required>
                        </div>
                        <div style="margin-top: 2%">
                            <label for="location">Adresse email</label> <br>
                            <input type="text" name="location" id="location" placeholder="Location" required>
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
