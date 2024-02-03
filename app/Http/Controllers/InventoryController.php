<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal_car;
use App\Models\Purchase;

class InventoryController extends Controller
{


    public function list(Request $request)
    {
        $sortBy = $request->input('sort');
    
        $data['getRecord'] = Deal_car::getRecorddeal();
        $data['header_title'] = "Inventory";
        return view('admin.inventory.list', $data);
    }
    
    public function admindelete($id)
    {
        $data = Deal_car::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Deal Successfully Deleted");
    }

    public function adminaccept(Request $request, $id)
    {
        $data = Deal_car::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Deal Successfully Accepted");
    }
    
    public function admindecline(Request $request, string $id)
    {
        $data = Deal_car::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Deal Successfully Decline");
    }
}
