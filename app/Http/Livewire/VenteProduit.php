<?php

namespace App\Http\Livewire;
use App\Http\Livewire\Autocomplet as LivewireAutocomplet;
use App\Models\produit;
use App\Models\shop;
use App\Models\shop_produit;
use App\Models\vente;
use App\Models\vente_produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class VenteProduit extends Component
{
    use WithPagination;
    use LivewireAutocomplet;
    public $shop ="1";
    public $carts = [];
    public $quantiter =0;
    public $keys = null;
    public $montant_total =0;
    public function addtoCart($id){

        if(!empty($this->carts)){

            $this->keys = $this->searchForId($id, $this->carts);
            if($this->keys !== null){
                $this->carts[$this->keys]["quantiter"] = (int)$this->carts[$this->keys]["quantiter"] + 1;
                $this->carts[$this->keys]["prix_total"] = (int) produit::findOrFail($id)->prix * $this->carts[$this->keys]["quantiter"];
                $this->keys = "";
            }else{
                array_push($this->carts,array("produit" => $id,"quantiter" => "1","prix_total" => produit::findOrFail($id)->prix));
            }
        }else{
            array_push($this->carts,array("produit" => $id,"quantiter" => "1","prix_total" => produit::findOrFail($id)->prix));
        }

        $this->setMontatTotal();
    }

    function setMontatTotal(){
        $this->montant_total = 0;
        foreach($this->carts as $item => $values) {
            $this->montant_total += $values[ 'prix_total' ];
        }
    }
    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['produit'] === $id) {
                return $key;
            }
        }
        return null;
     }
    public function deleteToCart($id){
        $key = $this->searchForId($id, $this->carts);
        unset($this->carts[$key]);
        $this->setMontatTotal();
    }

    public function incremetQuatiter($id){
        $this->keys = $this->searchForId($id, $this->carts);
        $this->carts[$this->keys]["quantiter"] = (int)$this->carts[$this->keys]["quantiter"] + 1;
        $this->carts[$this->keys]["prix_total"] = (int)produit::findOrFail($id)->prix * $this->carts[$this->keys]["quantiter"];
        $this->setMontatTotal();
    }
    public function decrementQuatiter($id){
        $this->keys = $this->searchForId($id, $this->carts);

        if(! $this->carts[$this->keys]["quantiter"] == 0){
            $this->carts[$this->keys]["quantiter"] = (int)$this->carts[$this->keys]["quantiter"] - 1;
            $this->carts[$this->keys]["prix_total"] = (int) produit::findOrFail($id)->prix * $this->carts[$this->keys]["quantiter"];
        }else{
            unset($this->carts[$this->keys]);
        }
        $this->setMontatTotal();
    }

    public function valideAchat(){
        $vente = new vente();

        $vente->user_id = Auth::user()->id;
        $vente->shop_id =Auth::user()->shop->first()->shop->id ;
        $vente->montant_total =$this->montant_total;

        $vente->save();

        foreach($this->carts as $item_produit){

            $vente_produit = new vente_produit();

            $vente_produit->produit_id = $item_produit['produit'];

            $vente_produit->quantiter = $item_produit['quantiter'];

            $vente_produit->vente_id = $vente->id;

            $vente_produit->save();
            //Decommenter pour activer le stcok
            // $shop_produit = shop_produit::where('shop_id','=',$this->shop)->where('produit_id','=', $vente_produit->produit_id)->first();

            // $shop_produit->update([
            //     'stock' => (int)$shop_produit->stock - (int)$item_produit['quantiter']
            // ]);

            // $shop_produit->save();



        }

        $this->carts =[];
        $this->montant_total = 0;

        return redirect()->route('vente.facture',[$vente->id]);
    }
    public function annulerAchat(){
        $this->carts =[];
        $this->montant_total = 0;
    }
    public function updatedQuery()
    {
        $this->items = produit::where('name', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }

    public function paginationView(){

        return 'livewire.pagination';

    }

    public function render()
    {
        return view('livewire.vente-produit',[
            'produits'=> produit::where('name', 'like', '%' . $this->query. '%')->paginate(6),
            'shops'=>shop::findOrfail($this->shop)
        ]);
    }
}
