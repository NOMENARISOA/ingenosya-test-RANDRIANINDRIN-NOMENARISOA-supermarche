<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\shop;
use App\Models\shop_produit;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion_stock()
    {
        return view('stock.gestionstock');
    }

    public function stock_add(Request $request){
        $shop_produit = shop_produit::findOrFail($request->get('shop_produit_id'));
        $shop_produit->update([
            'stock'=> $request->get('stock')
        ]);
        $shop_produit->save();

        return redirect()->back()->with('success','Ajout stock du produit avec succès');
    }

    public function produit(){

        return view('stock.produit');
    }

    public function produit_add(Request $request){
        $produit = new produit();
        $produit->name = $request->get('name');
        $produit->description = $request->get('description');
        $produit->prix = $request->get('prix');
        $produit->unite = $request->get('unite');
        $produit->save();

        foreach(shop::all() as $shop){
            $shop_produit = new shop_produit();
            $shop_produit->shop_id = $shop->id;
            $shop_produit->produit_id = $produit->id;
            $shop_produit->stock = 0;
            $shop_produit->save();
        }

        return redirect()->back()->with('success','Ajout de produit avec succès');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
