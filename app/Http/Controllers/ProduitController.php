<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('dashboard/produit', compact('produits'));
    }

    public function homepage(){
        $produits = Produit::with('categorie')->get();
        return view('home/home', compact('produits'));
    }

    public function store(Request $request){
        $request -> validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required',
            'quantite' => 'required',
            'categorie' => 'required'
        ]);

        Produit::create([
            'nom' => $request['nom'],
            'description' => $request['description'],
            'prix' => $request['prix'],
            'image' => $request['image'],
            'quantite' => $request['quantite'],
            'categorie_id' => $request['categorie']
        ]);

        return redirect('/dashboard/produits');
    }

    public function destroy(Produit $produit){
        $produit->delete();
        return redirect('/dashboard/produits');
    }

    public function edit(Produit $produit){
        $item = Produit::with('categorie')->find($produit->id);
        return view('dashboard/editproduit', compact('item'));
    }

    public function update(Request $request, Produit $produit){

        $request -> validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required',
            'quantite' => 'required',
            'categorie' => 'required'
        ]);

        $produit->update([
            'nom' => $request['nom'],
            'description' => $request['description'],
            'prix' => $request['prix'],
            'image' => $request['image'],
            'quantite' => $request['quantite'],
            'categorie_id' => $request['categorie']
        ]);
        return redirect('/dashboard/produits');
    }


}
