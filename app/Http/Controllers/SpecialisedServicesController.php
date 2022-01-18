<?php

namespace App\Http\Controllers;

use App\SpecialisedService;
use Illuminate\Http\Request;

class SpecialisedServicesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('services.sservicecreate');
    }

    public function store()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'cost' => 'required',
        ]);

        \App\SpecialisedService::create($data);
    }

    public function retrieve()
    {
        return view('services.sserviceretrieve');
    }

    public function retrieveprocess()
    {
        $data = request()->validate([
            'user_id' => 'required',
        ]);

        $sservices = \App\SpecialisedService::where('user_id', $data)->get();

        return view('services.sserviceretrievepage', compact('sservices'));
    }

    public function edit(SpecialisedService $sservice)
    {
        return view('services.ssedit', compact('sservice'));
    }

    public function update(SpecialisedService $sservice)
    {
        $data = request()->validate([
            'title' => 'required',
            'cost' => 'required',
        ]);

        \App\SpecialisedService::where('id', $sservice->id )->update($data);

        return view('services.ssmessage');
    }

    public function delete(SpecialisedService $sservice)
    {
        \App\SpecialisedService::where('id', $sservice->id )->delete();

        return redirect("/ss/retrieve");
    }
}
