<div>
    <div class="container">
        <div class="card shadow" style="width: 100%;">
            <div class="card-body">
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-6">
                        <h4>Vente effectué par Utilisateur Ce jour</h4>
                    </div>
                    <div class="col-md-4">
                        @include('../livewire/autocomplet')
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom Utilisateur</th>
                        <th scope="col">Supermarket Administrer</th>
                        <th scope="col">Vente effectuée</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>USER-{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td> {{ $user->shop->first()->shop->name." ".$user->shop->first()->shop->location }} </td>
                                <td> {{ $user->vente->count()}} </td>
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

</div>
