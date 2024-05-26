<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PlantController extends Controller
{
    public function index()
    {
        // $plants = Plant::all();
        // return inertia('Plant', ['plant' => $plant]);
        // return inertia('Plant');
        $plant = Plant::orderBy('id')->get();

        return Inertia::render('Plant', ['plant' => $plant]);
    }

 
    public function view(Plant $plant) {
        return Inertia::render('Plant');
    }
    public function show(Plant $plant) {
        return Inertia::render('Plants/View', ['plants' => $plant]);
    }

    public function create()
    {
        return Inertia::render('Plants/Create', [
            'success' => session('success')
        ]);
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'imageUrl' => 'nullable|url',
            'name' => 'required',
            'price' => 'required',
        ]);
    
        $plant = new Plant();
        $plant->name = $request->name;
        $plant->price = $request->price;
        $plant->imageUrl = $request->imageUrl;
        $plant->save();
    
        return redirect('/plants')->with('success', 'plant created successfully');
    }
    

    public function update(Request $request, Plant $plant)
    {
        $validate = $request->validate([
            'imageUrl' => 'nullable|url',
            'name' => 'required',
            'price' => 'required',
        ]);


        $plant->update($validate);

        return redirect('/plants');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect('/plants')->with('success', 'plant deleted successfully');
    }

    public function toggle(Plant $plant) {
        $plant->featured = !$plant->featured;
        $plant->save();

        return back();
    }   
}
