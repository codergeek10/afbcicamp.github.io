<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Church;
use App\Models\Registrant;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    //

    public function index(Registrant $registrant)
    {
        $maleCount = $registrant->where('gender', 'male')->count();
        $femaleCount = $registrant->where('gender', 'female')->count();

       $confirmed = $this->confirmed();
       $unconfirmed = $this->unconfirmed();
       $churches = $this->churches();


        return view('admin.metrics', [
                    'male'=>$maleCount, 
                    'female'=>$femaleCount, 
                    'confirmed'=>$confirmed, 
                    'unconfirmed'=>$unconfirmed,
                    'churches'=>$churches,
        ]);
    }

    protected function confirmed(){
        $registrant = Registrant::all();
        $confirmed = 0;
        foreach($registrant as $campers)
        {
            if(!empty($campers->order_id)){
                $confirmed++;
            }
            
        }

        return $confirmed;
    }

    protected function unconfirmed(){
        $registrant = Registrant::all();
        $unconfirmed = 0;
        foreach($registrant as $campers)
        {
            if(empty($campers->order_id)){
                $unconfirmed++;
            }
            
        }
        
        return $unconfirmed;
    }

    protected function churches()
    {
        $churches = Church::with('registrants')->get();
        $churchesData = [];
    
        foreach ($churches as $church) {
            $registrantsCount = $church->registrants->count();
            
            if ($registrantsCount > 0) {
                $churchesData[] = [
                    'name' => $church->name,
                    'count' => $registrantsCount,
                ];
            }
        }
    
        return $churchesData;
    }
}
