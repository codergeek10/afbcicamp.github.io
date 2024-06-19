<?php

namespace App\Http\Controllers;

use App\Models\Registrants;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function index()
    {
        //
        $male = Registrants::where('gender', 'Male')->count();
        $female = Registrants::where('gender', 'Female')->count();

                // Debugging
                // dd(['male' => $male, 'female' => $female]);

        $chartjs = app()->chartjs
                ->name('Gender')
                ->type('pie')
                ->size(['width'=> 400, 'height' => 200])
                ->labels(['Male: ' . $male, 'Female: ' . $female])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB'],
                        'hoverBackgroundColor' => ['#c52649', '#1f83c5'],
                        'data' => [$male, $female]
                    ]
                ])
                ->options([]);

        // return view('example', compact('chartjs'));
        return [$chartjs, $male, $female];
    }

    public function firstTimeCamper()
    {
        //
        $notFirstTime = Registrants::where('first_time_camper', 'no')->count();
        $firstTime = Registrants::where('first_time_camper', 'yes')->count();

                // Debugging
                // dd(['male' => $male, 'female' => $female]);

        $chartjs = app()->chartjs
                ->name('Camp_Attendance')
                ->type('pie')
                ->size(['width'=> 400, 'height' => 200])
                ->labels(['No: ' . $notFirstTime, 'Yes: ' . $firstTime])
                ->datasets([
                    [
                        'backgroundColor' => ['#63ff87','#d936eb'],
                        'hoverBackgroundColor' => ['#16c93f','#b41dc5'],
                        'data' => [$notFirstTime, $firstTime]
                    ]
                ])
                ->options([]);

        // return view('example', compact('chartjs'));
        return [$chartjs, $notFirstTime, $firstTime];
    }

    public function ageGroup()
    {
        //
        $thirteenToFifteen = Registrants::where('age_group', '13-15')->count();
        $sixteenToNineteen = Registrants::where('age_group', '16-19')->count();
        $twentyToTwenty_Five = Registrants::where('age_group', '20-25')->count();
        $twenty_Five_Over = Registrants::where('age_group', '26 & Over')->count();

                // Debugging
                // dd(['male' => $male, 'female' => $female]);

        $chartjs = app()->chartjs
                ->name('Age_Group')
                ->type('pie')
                ->size(['width'=> 400, 'height' => 200])
                ->labels(['13-15:' . $thirteenToFifteen, '16-19: ' . $sixteenToNineteen, '20-25: ' . $twentyToTwenty_Five, '26 & Over: ' . $twenty_Five_Over])
                ->datasets([
                    [
                        'backgroundColor' => ['#f1782d', '#f4eb3e', '#16c93f', '#b41dc5'],
                        'hoverBackgroundColor' => ['#f1782d', '#f4eb3e', '#16c93f', '#b41dc5'],
                        'data' => [$thirteenToFifteen, $sixteenToNineteen, $twentyToTwenty_Five, $twenty_Five_Over]
                    ]
                ])
                ->options([]);

        // return view('example', compact('chartjs'));
        return [$chartjs, $thirteenToFifteen, $sixteenToNineteen, $twentyToTwenty_Five, $twenty_Five_Over];
    }

    // public function councilors()
    // {
    //     //
    //     $councilor = Registrants::where('role', '13-15')->count();

    //             // Debugging
    //             // dd(['male' => $male, 'female' => $female]);

    //     $chartjs = app()->chartjs
    //             ->name('Age_Group')
    //             ->type('pie')
    //             ->size(['width'=> 400, 'height' => 200])
    //             ->labels(['13-15:' . $thirteenToFifteen, '16-19: ' . $sixteenToNineteen, '20-25: ' . $twentyToTwenty_Five, '26 & Over: ' . $twenty_Five_Over])
    //             ->datasets([
    //                 [
    //                     'backgroundColor' => ['#f1782d', '#f4eb3e', '#16c93f', '#b41dc5'],
    //                     'hoverBackgroundColor' => ['#f1782d', '#f4eb3e', '#16c93f', '#b41dc5'],
    //                     'data' => [$thirteenToFifteen, $sixteenToNineteen, $twentyToTwenty_Five, $twenty_Five_Over]
    //                 ]
    //             ])
    //             ->options([]);

    //     // return view('example', compact('chartjs'));
    //     return [$chartjs, $thirteenToFifteen, $sixteenToNineteen, $twentyToTwenty_Five, $twenty_Five_Over];
    // }
}
