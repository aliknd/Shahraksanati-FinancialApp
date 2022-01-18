<?php

namespace App\Http\Controllers;

use App\GeneralService;
use Illuminate\Http\Request;

class GeneralServicesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        $gdata = \App\GeneralService::all();
        return view('services.gservicecreate', compact('gdata'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'cost' => 'required',
        ]);

        \App\GeneralService::create($data);
        return redirect("/gs/create");

    }

    public function edit(GeneralService $gservice)
    {
        return view('services.gsedit', compact('gservice'));
    }

    public function update(GeneralService $gservice)
    {
        $data = request()->validate([
            'title' => 'required',
            'cost' => 'required',
        ]);

        \App\GeneralService::where('id', $gservice->id )->update($data);

        return redirect("/gs/create");
    }

    public function delete(GeneralService $gservice)
    {
        \App\GeneralService::where('id', $gservice->id )->delete();

        return redirect("/gs/create");
    }
}
