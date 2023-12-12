<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacien;

class PharmaciensController extends Controller
{

        public function index()
        {
            // Afficher la liste des pharmaciens
            $pharmaciens = Pharmacien::all();
            return view('pharmaciens.index', compact('pharmaciens'));
        }

        public function create()
        {
            // Afficher le formulaire de création d'un pharmacien
            return view('pharmaciens.create');
        }

        public function store(Request $request)
        {
            // Enregistrer le nouveau pharmacien dans la base de données
            Pharmacien::create($request->all());
            // Rediriger vers la liste des pharmaciens
            return redirect()->route('pharmaciens.index');
        }

        public function show($id)
        {
            // Afficher les détails d'un pharmacien spécifique
            $pharmacien = Pharmacien::findOrFail($id);
            return view('pharmaciens.show', compact('pharmacien'));
        }

}
