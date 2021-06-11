<?php

namespace App\Http\Controllers;

use App\Models\vente;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('vente.index');
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
    public function store(Request $request,$carts)
    {
        dd($request->all());
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

    public function facture($id)
    {
        $vente = vente::findOrfail($id);
        $client = new Party([
            'name'          => "{$vente->shop->name} {$vente->shop->location}",
            'Nom Guichetier'  =>"{$vente->user->name}"
        ]);

        $customer = new Party([
            'name'          => 'Client_'.$vente->id,
        ]);
        $items = [];
        foreach($vente->allproduit as $produit){

            array_push($items,(new InvoiceItem())->title($produit->produit->name)->pricePerUnit($produit->produit->prix)->quantity($produit->quantiter));
        }
        // dd($items);


        $invoice = Invoice::make('receipt')
            ->series("{$vente->shop->name}-{$vente->shop->location}")
            ->sequence($vente->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('d/m/Y')
            ->currencySymbol('AR')
            ->currencyCode('Ariary')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator(' ')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->download();


    }
}
