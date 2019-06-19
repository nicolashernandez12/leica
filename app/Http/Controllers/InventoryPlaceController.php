<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\InventoryPlace;
use App\Inventory;
use App\ActiveInput;

class InventoryPlaceController extends Controller
{
    public function lists(){


        $places = Place::with('inventory')->get();
        $inventory_place = new InventoryPlace();
        
        return view('lists.inventory_place',compact('places'));
    }
}
