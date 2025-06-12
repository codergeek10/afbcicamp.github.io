<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Church;
use App\Models\District;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ChurchRequest;
use App\Http\Requests\ChurchUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ZonesController extends Controller
{
    // Display list of churches, districts and zones
    public function index()
    {
        $zones = Zone::paginate(10);
        return view('admin.zones', ['zones'=>$zones]);
    }

    // Display form to add churches, districts and zones
    public function create(Request $request): View
    {
        $districts = District::all();
        return view('admin.add_church', ['districts'=>$districts]);
    }

    // Store churches, districts and zones
    public function store(ChurchRequest $request): RedirectResponse
    {
        $church = new Church;
        $church->fill($request->validated());
        $church->save();
        return redirect()->route('church');
    }

    // Edit churches, districts and zones
    public function editChurch()
    {
        
    }

    // Delete churches, districts and zones
    public function deleteChurch()
    {
        
    }
}
