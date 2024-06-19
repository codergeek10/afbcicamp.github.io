<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\error;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    //
    public function index()
    {
        // URLs and Login Credentials
        $login_url = 'https://spurropen.com//auth.php?vu=login';
        $data_url = 'https://spurropen.com//services.php?vu=revenuedetails&eid=17990&sacid=3863';
        $credentials = [
            'login' => 'afbciyouths@gmail.com',
            'password' => 'WwfFseYCsrcj59s'
        ];

        // // Initialize a cURL session
        // $ch = curl_init();

        // // Set the cURL options for the login request
        // curl_setopt($ch, CURLOPT_URL, $login_url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($credentials));
        // curl_setopt($ch, CURLOPT_COOKIEJAR, storage_path('app/cookies.txt')); // Save cookies to maintain session
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // // Execute the login request
        // $login_response = curl_exec($ch);

        // // Check for errors
        // if(curl_errno($ch)){
        //     return response()->json(['error' => 'Unable to login'], 500);
        // }

        // // Now fetch the data page using the same session
        // curl_setopt($ch, CURLOPT_URL, $data_url);
        // curl_setopt($ch, CURLOPT_POST, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($credentials));
        // curl_setopt($ch, CURLOPT_COOKIEFILE, storage_path('app/cookies.txt')); // Used the saved cookies

        // // Execute the data fetch request
        // $data_response = curl_exec($ch);

        // // Check for errors
        // if(curl_errno($ch)){
        //     return response()->json(['error' => 'Unable to fetch data'], 500);
        // }

        // // Close the cURL session
        // curl_close($ch);

        // // Decode the JSON response
        // $customers = json_decode($data_response, true);

        // // Check if decoding was successfull
        // if(json_last_error() !== JSON_ERROR_NONE){
        //     return response()->json(['error' => 'Invalid JSON response'], 500);
        // }

        // // Pass the data to the view
        // // return view('customers', ['customers' => $customers]);

        // // Pass the raw JSON to the view
        // return view('customers', ['json_data' => $data_response]);
// _________________________________________________________________________________________________________
        // try {
        //     // Perform login request with SSL verification disabled
        //     $login_response = Http::asForm()
        //         ->withOptions(['verify' => false])
        //         ->post($login_url, $credentials);

        //     // Log the login request details
        //     Log::info('Login request sent', [
        //         'url' => $login_url,
        //         'credentials' => $credentials
        //     ]);

        //     if ($login_response->failed()) {
        //         Log::error('Login request failed', [
        //             'status' => $login_response->status(),
        //             'body' => $login_response->body()
        //         ]);
        //         return response()->json(['error' => 'Unable to login'], 500);
        //     }

        //     // Extract cookies from the login response
        //     $cookies = collect($login_response->cookies()->toArray())->pluck('Value', 'Name')->toArray();

        //     // Use the extracted cookies to fetch the data with SSL verification disabled
        //     $data_response = Http::withCookies($cookies, 'spurropen.com')
        //         ->withOptions(['verify' => false])
        //         ->get($data_url);

        //     // Log the data fetch request details
        //     Log::info('Data fetch request sent', [
        //         'url' => $data_url,
        //         'cookies' => $cookies
        //     ]);

        //     if ($data_response->failed()) {
        //         Log::error('Data fetch request failed', [
        //             'status' => $data_response->status(),
        //             'body' => $data_response->body()
        //         ]);
        //         return response()->json(['error' => 'Unable to fetch data'], 500);
        //     }

        //     // Decode the JSON response
        //     $customers = $data_response->json();

        //     if (json_last_error() !== JSON_ERROR_NONE) {
        //         Log::error('JSON decode error', ['error' => json_last_error_msg()]);
        //         return response()->json(['error' => 'Invalid JSON response'], 500);
        //     }

        //     // Pass the data to the view
        //     return view('customers', ['customers' => $customers]);

        // } catch (\Exception $e) {
        //     Log::error('Exception occurred while fetching data from Spurr Open: '.$e->getMessage(), [
        //         'exception' => $e
        //     ]);
        //     return response()->json(['error' => 'An error occurred'], 500);
        // }

        // ________________________________________________________________________________________________________________________

        try {
            // Perform login request with SSL verification disabled
            $login_response = Http::asForm()
                ->withOptions(['verify' => true])
                ->post($login_url, $credentials);

            // Log the login request details
            Log::info('Login request sent', [
                'url' => $login_url,
                'credentials' => $credentials
            ]);

            if ($login_response->failed()) {
                Log::error('Login request failed', [
                    'status' => $login_response->status(),
                    'body' => $login_response->body()
                ]);
                return response()->json(['error' => 'Unable to login'], 500);
            }

            // Extract cookies from the login response
            $cookies = collect($login_response->cookies()->toArray())->pluck('Value', 'Name')->toArray();

            // Use the extracted cookies to fetch the data with SSL verification disabled
            $data_response = Http::withCookies($cookies, 'spurropen.com')
                ->withOptions(['verify' => false])
                ->get($data_url);

            // Log the data fetch request details
            Log::info('Data fetch request sent', [
                'url' => $data_url,
                'cookies' => $cookies
            ]);

            if ($data_response->failed()) {
                Log::error('Data fetch request failed', [
                    'status' => $data_response->status(),
                    'body' => $data_response->body()
                ]);
                return response()->json(['error' => 'Unable to fetch data'], 500);
            }

            // Log the raw response body for debugging
            Log::info('Raw data response body', ['body' => $data_response->body()]);

            // Decode the JSON response
            $customers = $data_response->json();

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON decode error', ['error' => json_last_error_msg(), 'body' => $data_response->body()]);
                return response()->json(['error' => 'Invalid JSON response'], 500);
            }

            // Pass the data to the view
            return view('customers', ['customers' => $customers]);

        } catch (\Exception $e) {
            Log::error('Exception occurred while fetching data from Spurr Open: '.$e->getMessage(), [
                'exception' => $e
            ]);
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
