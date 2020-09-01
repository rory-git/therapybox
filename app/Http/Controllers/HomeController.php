<?php

namespace App\Http\Controllers;

use App\Clothing;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * Get sports news and cache
         */
        $client = new Client();
        if (Cache::get('sportsNews')) {
            $sportsNews = Cache::get('sportsNews');
        } else {
            $sportsNews = json_decode($client->request('GET', 'https://skysportsapi.herokuapp.com/sky/football/getteamnews/napoli/v1.0/')->getBody());
            Cache::put('sportsNews', $sportsNews, now()->addMinutes(15));
        }

        /**
         * Get weather and cache
         */
        $clientWeather = new Client();
        if (Cache::get('weather')) {
            $weather = Cache::get('weather');
        } else {
            $weather = json_decode($clientWeather->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=london&units=metric&appid=ead3173a5476e1bf714c54fcd5ee9574')->getBody());
            Cache::put('weather', $weather, now()->addMinutes(15));
        }

        // Sort clothing data for pie chart
        $blazers = Clothing::where('clothe', 'blazer')->count();
        $hoodies = Clothing::where('clothe', 'hoodie')->count();
        $jackets = Clothing::where('clothe', 'jacket')->count();
        $jumpers = Clothing::where('clothe', 'jacket')->count();
        $raincoats = Clothing::where('clothe', 'raincoat')->count();
        $sweaters = Clothing::where('clothe', 'sweater')->count();

        $clothes = [
            'blazers',
            'hoodies',
            'jackets',
            'jumpers',
            'raincoats',
            'sweaters'
        ];

        $clothesValues = [
            $blazers,
            $hoodies,
            $jackets,
            $jumpers,
            $raincoats,
            $sweaters
        ];

        return view('home', compact('clothes', 'clothesValues', 'sportsNews', 'weather'));
    }
}
