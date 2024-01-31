<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Purchase extends Model
{
    use HasFactory;

    protected $casts = [
        'purchase_date' => 'datetime',
    ];

    protected $table ="purchases";

    static public function getSingle($id) 
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        
    
        $return = Purchase::select('purchases.*','cars.vin','cars.brands','cars.models','cars.photo','users.name as name', 'users.last_name as last_name')
                ->join('cars', 'cars.id', '=', 'purchases.car_id')
                ->join('users', 'users.id', '=', 'purchases.customer_id')
                ->where('purchases.is_delete','=', 0)
                ->orderBy('purchases.id','desc')
                ->paginate(10);
    
        return $return;
    }
    
    static public function getTotalPurchaseCar()
    {
       

        $return = Purchase::select('purchases.*','cars.vin','cars.brands','cars.models','cars.photo','users.name as name', 'users.last_name as last_name')
                ->join('cars', 'cars.id', '=', 'purchases.car_id')
                ->join('users', 'users.id', '=', 'purchases.customer_id')
                ->where('purchases.is_delete','=', 0)
                ->orderBy('purchases.id','desc')
                ->count();

        return $return;
    }

    static public function getcustomerRecordAccepted($userId)
    {
        $return = Purchase::select('purchases.*','cars.*','users.name as name', 'users.last_name as last_name')
                ->join('cars', 'cars.id', '=', 'purchases.car_id')
                ->join('users', 'users.id', '=', 'purchases.customer_id')
                ->where('purchases.status','=', 'accepted')
                ->where('purchases.is_delete','=', 0)
                ->where('purchases.customer_id', '=', $userId) // Filter by authenticated user's ID
                ->orderBy('purchases.id','desc')
                ->paginate(10);
    
        return $return;
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

    
    static public function getTotalPuchaseCustomer()
    {


        $return = Purchase::select('purchases.*','cars.*','users.name as name', 'users.last_name as last_name')
                ->join('cars', 'cars.id', '=', 'purchases.car_id')
                ->join('users', 'users.id', '=', 'purchases.customer_id')
                ->where('purchases.is_delete','=', 0)
                ->orderBy('purchases.id','desc')
                ->count();

        return $return;
    }

    public function getPhotoDirect()
    {
        if(!empty($this->photo) && file_exists('upload/car/'.$this->photo))
        {
            return url('upload/car/'.$this->photo);
        }
        else
        {
            return asset('upload/profile/user.jpg');
        
        }
    
    }
    static public function getRecordsale()
    {
        // Base query
    $return = Purchase::select(
        'cars.brands as brands',
        DB::raw('COUNT(purchases.id) as total_sales'), // Count of sales per brand
        DB::raw('SUM(cars.price) as total_price') // Sum of price per brand
    )
    ->join('users', 'users.id', '=', 'purchases.customer_id')
    ->join('cars', 'cars.id', '=', 'purchases.car_id')
    ->where('purchases.is_delete', '=', 0)
    ->where('purchases.status', '=', 'accepted')
    ->groupBy('cars.brands') // Group by brand
    ->paginate(10);

    return $return;
    }
    
}
