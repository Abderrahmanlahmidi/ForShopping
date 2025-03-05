<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
     public function index(){
         $categories = Categorie::All();
         return view('dashboard/categorie', compact('categories'));
     }

     public function store(Request $request){
         $request->validate([
             'categorie' => 'required',
             'description' => 'required',
         ]);

         Categorie::create([
             'nom' => $request['categorie'],
             'description' => $request['description'],
         ]);

         return redirect('/dashboard/categories');
     }

     public function destroy(Categorie $categorie){
         $categorie->delete();
         return redirect('/dashboard/categories');
     }




}
