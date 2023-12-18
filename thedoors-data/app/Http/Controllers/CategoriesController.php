<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return Categories::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categories = new Categories;
        $categories->name = $request->name;

        $categories->save();

        return $categories;
    }

    public function show(Categories $categories)
    {
        //
    }

    public function update(Request $request, Categories $categories)
    {
        //
    }
    
    public function destroy($id)
    {
        $categories = Categories::find($id);

        if(is_null($categories))
        {
            return response()->json('No se ha encontrado la categoría',404);
        }

        $categories->delete();

        return response()->noContent();
    }
}
