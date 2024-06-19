<?php

namespace App\Http\Controllers;

use App\Models\Registrant;
use Illuminate\Http\Request;

class CampersController extends Controller
{
    //
    public function index()
    {
        $all = Registrant::all();
        $campers = Registrant::paginate(10);
        $numCampers = $all->count();
        $unconfirmed = 0;
        foreach($all as $registrant)
        {
            if(empty($registrant->order_id)){
                $unconfirmed++;
            }
            
        }
        $confirmed = $numCampers - $unconfirmed;
        

        return view('admin.campers', ['campers'=>$campers, 'camperCount' => $numCampers, 
                    'unconfirmed'=>$unconfirmed, 'confirmed'=>$confirmed]);
    }
}
