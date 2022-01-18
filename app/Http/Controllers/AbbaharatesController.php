<?php

namespace App\Http\Controllers;

use App\Abbaharate;
use App\Abbaharate2;
use Illuminate\Http\Request;

class AbbaharatesController extends Controller
{
    public function create()
    {
        $adata = \App\Abbaharate::all();
        return view('E&B.abbahacreate', compact('adata'));
    }

    public function edit(Abbaharate $arate)
    {
        return view('E&B.aredit', compact('arate'));
    }

    public function update(Abbaharate $arate)
    {
        $data = request()->validate([
            'capacity' => 'required',
            'cost' => 'required',
        ]);

        \App\Abbaharate::where('id', $arate->id )->update($data);

        return redirect("/ar/create");
    }



    public function ar2create()
    {
        $adata = \App\Abbaharate2::all();
        return view('E&B.abbaha2create', compact('adata'));
    }

    public function ar2edit(Abbaharate2 $a2rate)
    {
        return view('E&B.ar2edit', compact('a2rate'));
    }

    public function ar2update(Abbaharate2 $a2rate)
    {
        $data = request()->validate([
            'capacity' => 'required',
            'cost' => 'required',
        ]);

        \App\Abbaharate2::where('id', $a2rate->id )->update($data);

        return redirect("/ar2/create");
    }
}
