<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{

        public function index()
        {
            // Afficher la liste des fournisseur
            $fournisseurs = Fournisseur::all();
            return view('fournisseurs.index', compact('fournisseurs'));
        }

        public function create()
        {
            // Afficher le formulaire de création d'un pharmacien
            return view('fournisseurs.create');
        }

        public function store(Request $request)
        {
            // Enregistrer le nouveau pharmacien dans la base de données
            Fournisseur::create($request->all());
            // Rediriger vers la liste des pharmaciens
            return redirect()->route('fournisseurs.index');
        }

        public function show($id)
        {
            // Afficher les détails d'un pharmacien spécifique
            $fournisseurs = Fournisseur::findOrFail($id);
            return view('fournisseurs.show', compact('fournisseurs'));
        }

}
