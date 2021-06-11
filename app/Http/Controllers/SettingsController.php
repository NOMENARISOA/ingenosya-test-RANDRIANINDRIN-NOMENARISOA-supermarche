<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Models\User;
use App\Models\user_shop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userindex()
    {
        return view ('settings.user');
    }

    public function userAdd(Request $request)
    {
        dd($request->all());
        try{
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            if($request->get('role') == 2){
                foreach($request->get('shop_superviseur') as $shop){
                    $user_shop = new user_shop();
                    $user_shop->user_id = $user->id;
                    $user_shop->shop_id = $shop;
                    $user_shop->save();
                }
            }elseif($request->get('shop_vendeur') == 3){
                    $user_shop = new user_shop();
                    $user_shop->user_id = $user->id;
                    $user_shop->shop_id = $request->get('shop_vendeur');
                    $user_shop->save();
            }
            return redirect()->back()->with('success','Utilisateur Créé avec succès');
        }catch(Exception $e){
            return redirect()->back()->with('error','Email ou Username déjà utiliser');
        }




    }
    public function shopindex(){

        return view('settings.shop');

    }

    public function shopadd(Request $request){

        $shop = new shop();
        $shop->name = $request->get('name');
        $shop->location = $request->get('location');
        $shop->save();
        return redirect()->back()->with('success','Nouvelle supermarcher creer avec succès');
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
