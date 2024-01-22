<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table ="cars";

    static public function getSingle($id) 
    {
        return self::find($id);
    }
    
    static public function getRecord()
    {
        
        $return = Car::select('cars.*','users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('users', 'users.id', '=', 'cars.created_by')
                ->where('cars.is_delete','=', 0)
                ->orderBy('cars.id','desc')
                ->paginate(10);

        return $return;
    }

    static public function getTotalCar()
    {
        
        $return = Car::select('cars.*','users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('users', 'users.id', '=', 'cars.created_by')
                ->where('cars.is_delete','=', 0)
                ->orderBy('cars.id','desc')
                ->count();

        return $return;
    }

    static public function getRecordCustomer($sortOption = 'newest', $searchTerm = null)
    {
        $purchasedCarIds = Purchase::pluck('car_id')->toArray();
    
        $query = Car::select('cars.*', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
            ->join('users', 'users.id', '=', 'cars.created_by')
            ->whereNotIn('cars.id', $purchasedCarIds)
            ->where('cars.is_delete', '=', 0);


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
              ->orWhere('cars.created_by', 'like', '%' . $searchTerm . '%')
              
              // Add more fields as needed for searching
              ;
        });
    }
    
        // Handle sorting options
        switch ($sortOption) {
            case 'low_to_high':
                $query->orderBy('cars.price', 'asc');
                break;
            case 'high_to_low':
                $query->orderBy('cars.price', 'desc');
                break;
            case '1-2':
                $query->whereBetween('cars.price', [100000, 2000000]);
                break;
            case '2-3':
                $query->whereBetween('cars.price', [2000000, 3000000]);
                break;
            case '3-4':
                $query->whereBetween('cars.price', [3000000, 4000000]);
                break;
            case '4-5':
                $query->whereBetween('cars.price', [4000000, 5000000]);
                break;
            case 'newest':
            default:
                $query->orderBy('cars.id', 'desc');
                break;
        }
    
        return $query->paginate(6);
    }
    
    

    static public function getTotalCarCustomer()
    {
        // Get the IDs of purchased cars
        $purchasedCarIds = Purchase::pluck('car_id')->toArray();

        // Fetch cars that are not purchased
        $availableCars = Car::select('cars.*', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
            ->join('users', 'users.id', '=', 'cars.created_by')
            ->whereNotIn('cars.id', $purchasedCarIds)
            ->where('cars.is_delete', '=', 0)
            ->orderBy('cars.id', 'desc')
            ->count();

        return $availableCars;
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

static public function  getModel()
{
    $return = Car::select('cars.*')
    ->join('users','users.id','cars.created_by')
    ->where('cars.is_delete', '=', 0)
    ->get();

return $return;
}

}
