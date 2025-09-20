<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Boxe;


class BoxeController extends Controller
{
    public function create(Request $request)
    {
        $formFields = $request->validate([
            // verifie si l'utilisateur existe déjà
            'name' => 'required',
            'weight'=> 'required',
            'size'=> 'required',
            'id'=> 'required',

        ]);

        $formFields['users_id'] = auth()->user()->id;
        $formFields['created_at'] = date('Y-m-d H:i:s',strtotime('now'));
        Boxe::create(['users_id'=>auth()->user()->id,'sets_id'=>$formFields['users_id'],'name'=>$formFields['name'],'weight'=>$formFields['weight'],'types_id'=>$formFields['size'],'active'=> 1]);


        return back()->with('Nouvelle boite crée');

    }

}
