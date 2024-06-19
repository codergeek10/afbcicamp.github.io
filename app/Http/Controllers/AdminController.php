<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    public function index(): View|RedirectResponse
    {
        if (Auth::guard('admin')->check()){
            return redirect()->route('dashboard');
        }
        return view('admin.admin_login');
    }

    public function dashboard(): View
    {
        return view('admin.admin_dashboard');
    }


}
