<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function list()
    {
        $data['getRecord']= Purchase::getRecord();
        $data['header_title'] = "Cars";
        return view('dealer.purchase.list', $data);
    }

    public function delete($id)
    {
        $data = Purchase::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function accept(Request $request, $id)
    {
        $data = Purchase::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function decline(Request $request, string $id)
    {
        $data = Purchase::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }

//customer
public function notpurchaselist()
{
    $userId = Auth::id();

    $data['getRecord'] = Purchase::getcustomerRecordDecline($userId);
    $data['header_title'] = "Cars";

    return view('student.purchase.list', $data);
}

static public function getcustomerRecordDecline($userId)
{
    $return = Purchase::select('purchases.*','cars.*','users.name as name', 'users.last_name as last_name')
            ->join('cars', 'cars.id', '=', 'purchases.car_id')
            ->join('users', 'users.id', '=', 'purchases.customer_id')
            ->where('purchases.status','=', 'declined')
            ->where('purchases.is_delete','=', 0)
            ->where('purchases.customer_id', '=', $userId) // Filter by authenticated user's ID
            ->orderBy('purchases.id','desc')
            ->paginate(10);

    return $return;
}


public function purchaselist()
{
    $userId = Auth::id();

    $data['getRecord'] = Purchase::getcustomerRecordAccepted($userId);
    $data['header_title'] = "Cars";

    return view('student.purchase.list', $data);
}

    //admin

    public function adminlist()
    {
        $data['getRecord']= Purchase::getRecord();
        $data['header_title'] = "Cars";
        return view('admin.purchase.list', $data);
    }

    public function admindelete($id)
    {
        $data = Purchase::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function adminaccept(Request $request, $id)
    {
        $data = Purchase::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function admindecline(Request $request, string $id)
    {
        $data = Purchase::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }

    public function saleslist(Request $request)
    {
    
        $data['getRecord'] = Purchase::getRecordsale();
        $data['header_title'] = "Inventory";
        return view('admin.inventory.sales', $data);
    }
}
