<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Church;
use HTMLPurifier_Config;
use App\Models\Registrant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\CamperRegistered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegistrantRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ChartController;
use App\Http\Requests\CampProfileUpdateRequest;

class RegistrantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $roles = Role::all();
        $churches = Church::all();
        return view('auth.camp-registration', ['roles'=>$roles, 'churches'=>$churches,
            'user' => $request->user(),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrantRequest $request): RedirectResponse
    {
        Log::info('Update method reached');
        // Create a Registration code
        $registrationCode = Str::random(6);

        $user = Auth::user();

      // Create the registrant with the registration code
      if ($request) {
        Log::info('Registrant found');
        $registrant = Registrant::create(array_merge(
            $request->validated(),
            [
                'user_id' => $user->id,
                'registration_Code' => $registrationCode,
            ]    
        ));
        } else {
            Log::error('Registrant not found for user', ['user' => $user]);
            return Redirect::route('profile.edit')->withErrors('Registrant not found.');
        }
         
        
        event(new CamperRegistered($registrant));

        return Redirect::route('register.confirm')->with(['code'=>$registrationCode, 'name'=>$request->firstname]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrant $registrant, $id)
    {
        $camper = Registrant::where('id', $id)->firstOrFail();
        //$campers = $registrant->where('id', $id);
        // $campers = Registrants::findOrFail($id);

        return view('admin.registrant', ['camper' =>$camper]);
        //return view('thank_you', compact('registrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampProfileUpdateRequest $request) : RedirectResponse
    {
        Log::info('Update method reached');
    
        $user = Auth::user();
        $registrant = $user->registrant->first();
    
        if ($registrant) {
            Log::info('Registrant found', ['registrant' => $registrant]);
    
            $registrant->fill($request->validated());
            $registrant->save();
        } else {
            Log::error('Registrant not found for user', ['user' => $user]);
            return Redirect::route('profile.edit')->withErrors('Registrant not found.');
        }
    
        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
