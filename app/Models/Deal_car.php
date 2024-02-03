<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deal_car extends Model
{

    protected $table ="deal_cars";


    
    use HasFactory;

    static public function getSingle($id) 
    {
        return self::find($id);
    }

    


    static public function getRecord()
    {
        
        $return = Deal_car::select('deal_cars.*','cars.*','users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('users', 'users.id', '=', 'deal_cars.dealer_id')
                ->join('cars', 'cars.id', '=', 'deal_cars.car_id')
                ->where('deal_cars.is_delete','=', 0)
                ->orderBy('deal_cars.id','desc')
                ->paginate(10);

        return $return;
    }


    static public function getRecorddeal()
    {
        // Base query
        $return = Deal_car::select(
            'deal_cars.*',
            'cars.vin as vin',
            'cars.brands as brands',
            'cars.models as models',
            'cars.color as color',
            'cars.engine as engine',
            'cars.transmission as transmission',
            'cars.price as price',
            'users.name as created_by_name',
            'users.last_name as created_by_last_name'
        )
        ->join('users', 'users.id', '=', 'deal_cars.dealer_id')
        ->join('cars', 'cars.id', '=', 'deal_cars.car_id')
        ->where('deal_cars.is_delete', '=', 0)
        ->paginate(10);

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

    static public function getRecordCustomer($minPrice = null, $maxPrice = null, $searchTerm = null)
    {
        $purchasedCarIds = Purchase::pluck('car_id')->toArray();
        
        $query = Deal_car::select('deal_cars.*','cars.*', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
            ->join('users', 'users.id', '=', 'deal_cars.dealer_id')
            ->join('cars', 'cars.id', '=', 'deal_cars.car_id')
            ->whereNotIn('deal_cars.id', $purchasedCarIds)
            ->where('deal_cars.is_delete', '=', 0)
            ->where('deal_cars.status', '=', 'accepted');
           
    
        // Handle search term
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('cars.vin', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.brands', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.models', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.color', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.engine', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.transmission', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.price', 'like', '%' . $searchTerm . '%')
                  ->orWhere('cars.created_by', 'like', '%' . $searchTerm . '%');
            });
        }
    
        // Handle price range
        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('cars.price', [$minPrice, $maxPrice]);
        }
    
        return $query->orderBy('deal_cars.id', 'desc')->paginate(6);
    }
    

}
