<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    public function index()
    {
    	$items = Item::all()->sortByDesc('id');
    	return view('list')->with('items', $items);
    }

    public function create(request $request)
    {   	

    	$item = new Item();
    	$item->item = $request->text;
    	$item->save();
    	return 'done';
    }
    public function delete(request $request)
    {
    	Item::where('id', $request->id)->delete();
    	return 'done';
    }
    public function update(request $request)
    {
    	$item = Item::find($request->id);
    	$item->item = $request->item;
    	$item->save();
    	
    	return 'done';
    }
    public function search(request $request)
    {
    	$term = $request->term;
    	$item = Item::where('item', 'LIKE', '%'.$term.'%')->get();

    	if (count($item)==0) {
    		$result[] = 'რეზულტატი არ მოიძებნა';
    	}else{
    		foreach ($item as $key => $value) {
    			$result[] =$value->item;
    		}
    	}
    	return $result;    	
    	
    	
    }



}
