<?php

namespace App\Http\Controllers;

use App\Enshabrate;
use Illuminate\Http\Request;

class EnshabratesController extends Controller
{
    public function create()
    {
        $edata = \App\Enshabrate::all();
        return view('E&B.enshabcreate', compact('edata'));
    }

    public function edit(Enshabrate $erate)
    {
        return view('E&B.eredit', compact('erate'));
    }

    public function update(Enshabrate $erate)
    {
        $data = request()->validate([
            'enshab' => 'required',
            'cost' => 'required',
        ]);

        \App\Enshabrate::where('id', $erate->id )->update($data);

        return redirect("/er/create");
    }
}
