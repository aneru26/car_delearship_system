<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parts extends Model
{
    use HasFactory;

    protected $table ="parts";

    static public function getSingle($id) 
    {
        return self::find($id);
    }
    

    public function getPhotoDirect()
{
    if(!empty($this->photo) && file_exists('upload/parts/'.$this->photo))
    {
        return url('upload/parts/'.$this->photo);
    }
    else
    {
        return asset('upload/profile/user.jpg');
    
    }

}

static public function getRecord()
{
    $return = Parts::select('parts.*', 'cars.models as models', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CAST(parts.car_models AS bigint)')) // Explicit casting
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->paginate(10);

    return $return;
}

static public function getTotalParts()
{
    $return = Parts::select('parts.*', 'cars.models as models', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CAST(parts.car_models AS bigint)')) // Explicit casting
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->count();

    return $return;
}


static public function getRecordCustomer($sortOption, $searchTerm = null)
{
    $purchasedPartsIds = Purchase_Parts::pluck('parts_id')->toArray();

    $query = Parts::select('parts.*', 'cars.models as models', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CAST(parts.car_models AS bigint)'))
        ->whereNotIn('parts.id', $purchasedPartsIds)
        ->where('parts.is_delete', '=', 0);

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('parts.parts_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('parts.car_models', 'like', '%' . $searchTerm . '%')
                    ->orWhere('parts.price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('parts.created_by', 'like', '%' . $searchTerm . '%');
        
                // Additional condition for exact match on car_models
                $q->orWhere('cars.models', '=', $searchTerm);
        
                // Add more fields as needed for searching
            });
        }

    switch ($sortOption) {
        case 'low_to_high':
            $query->orderBy('parts.price', 'asc');
            break;

        case 'high_to_low':
            $query->orderBy('parts.price', 'desc');
            break;

        case '1-2':
            $query->whereBetween('parts.price', [1000000, 2000000]);
            break;

        case '2-3':
            $query->whereBetween('parts.price', [2000000, 3000000]);
            break;

        case '3-4':
            $query->whereBetween('parts.price', [3000000, 4000000]);
            break;

        case '4-5':
            $query->whereBetween('parts.price', [4000000, 5000000]);
            break;

        // Add more cases for other sorting options

        default:
            $query->orderBy('parts.id', 'desc'); // Default sorting option is 'newest'
            break;
    }

    $result = $query->paginate(6);

    return $result;
}

static public function getTotalPartsCustomer()
{
    // Get the IDs of purchased cars
    $purchasedPartsIds = Purchase_Parts::pluck('parts_id')->toArray();

    // Fetch cars that are not purchased
        $availableCars = Parts::select('parts.*','cars.models as models','users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CAST(parts.car_models AS bigint)')) // Explicit casting
        ->whereNotIn('parts.id', $purchasedPartsIds)
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->count();

    return $availableCars;
}
}
