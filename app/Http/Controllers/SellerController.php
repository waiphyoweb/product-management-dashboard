<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();

        return view('sellers.index', [
            'sellers' => $sellers,
        ]);
    }

    /**
     * Create a newly resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('sellers.create');
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
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->contact = $request->contact;
        $seller->address = $request->address;
        $seller->save();

        return redirect('/sellers')->with('seller-create', 'Seller is created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = Seller::find($id);

        return view('sellers.detail', [
            'seller' => $seller,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Seller::find($id);

        return view('sellers.update', [
            'seller' => $seller,
        ]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $seller = Seller::find($id);
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->contact = $request->contact;
        $seller->address = $request->address;
        $seller->save();

        return redirect("/sellers/detail/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::destroy($id);

        return redirect('/sellers')->with('seller-delete', 'Seller is deleted!');
    }
}
