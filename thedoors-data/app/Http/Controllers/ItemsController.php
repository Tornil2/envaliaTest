<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categories;
use Illuminate\Http\Request;
use Money\Currency;
use Money\Money;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input("category");
        $admin = $request->input("admin");
        $items = Items::where('category_id','=',$category)->paginate(16);

        return $items->appends(['category'=>$category]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'material' => 'required',
            'price' => 'required',
            'dimension' => 'required',
            'description' => 'required',
            'images' => 'required',
            'armored' => 'required',
            'hidden' => 'required'
        ]);

        $items = new Items;
        $items->name = $request->name;
        $items->category_id = $request->category_id;
        $items->material = $request->material;
        $items->price = $request->price;
        $items->dimension = $request->dimension;
        $items->description = $request->description;
        $items->images = $request->images;
        $items->armored = $request->armored;
        $items->hidden = $request->hidden;

        $items->save();

        return $items;
    }

    public function show($id)
    {
        $items = Items::find($id);
        if(isset($items->price)){
            $items->price = Money::EUR($items->price)->subtract(Money::EUR(1));
        }
        if(isset($items->dimension) && count(explode("x", $items->dimension)) == 3){
            $items->dimension = array("X"=>explode("x", $items->dimension)[0],"Y"=>explode("x", $items->dimension)[1],"Z"=>explode("x", $items->dimension)[2]);
        }
        if(isset($items->images)){
            $items->images = json_decode($items->images);
        }
        
        return $items;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'material' => 'required',
            'price' => 'required',
            'dimension' => 'required',
            'description' => 'required',
            'images' => 'required',
            'armored' => 'required',
            'hidden' => 'required'
        ]);

        $items = Items::find($id);
        $items->name = $request->name;
        $items->category_id = $request->category_id;
        $items->material = $request->material;
        $items->price = $request->price;
        $items->dimension = $request->dimension;
        $items->description = $request->description;
        $items->images = $request->images;
        $items->armored = $request->armored;
        $items->hidden = $request->hidden;

        $items->update();

        return $items;
    }
    
    public function destroy($id)
    {
        $items = Items::find($id);

        if(is_null($items))
        {
            return response()->json('No se ha encontrado el Item',404);
        }

        $items->delete();

        return response()->noContent();
    }
}
