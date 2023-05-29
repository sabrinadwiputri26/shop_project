<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Http\Request;
use Carbon\Carbonx;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view ('dashboard.home');
    }

    public function login()
    {
        return view ('dashboard.login');
    }


    public function auth(Request $request){

         $request->validate([
          'email'=>'required|email:dns',
          'password'=>'required',
        ]);
        $user = $request->only('email', 'password');
        if(Auth::attempt($user)){
            return redirect()->route('dashboard');
        }else {
            return redirect()->back()->with('error', 'Gagal Login!!');
        }
    }


    public function data()
    {
        $shop = Shop::all();
        return view ('dashboard.data', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::all();
        return view ('dashboard.create', compact('shop'));
    }

    public function done(Request $request, $id)
    {
        $shop = Shop::where('id', $id)->update([
            'retdate' => \Carbon\Carbon::now()
        ]);
           return redirect()->back()->with('done', 'a');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'barang' => 'required',
            'harga' => 'required',
            'ket' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,svg,webp',

        ]);

        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $path = public_path('assets/image/');
        $image->move($path, $imgName);

        Shop::create([
            'name'=> $request->name,
            'barang' => $request->barang,
            'harga' => $request->harga,
            'ket' => $request->ket,
            'foto' => $imgName,
        ]);
        return redirect('/data')->with('succesUpdate', 'Edit Succes!!');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $Shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = shop::where('id', '=', $id)->firstOrFail();
        return view('dashboard.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'barang' => 'required',
            'harga' => 'required',
            'ket' => 'required',

        ]);
        if (is_null($request->file('foto'))){
            $imgName = Shop::where('id', '=', $id)->value('foto');
        }else {
            $image = $request->file('foto');
            $imgName = rand() . '.' . $image->extension();
            $path = public_path('assets/image/');
            $image->move($path, $imgName);
        }

        Shop::where('id', '=', $id)->update([
            'name'=> $request->name,
            'barang' => $request->barang,
            'harga' =>$request->harga,
            'ket'=>$request->ket,
            'foto' => $imgName,
        ]);
        return redirect('/data')->with('succesUpdate', 'Edit Succes!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $Shop, $id)
    {
        shop::where('id', $id)->delete();
        return redirect()->back();
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}