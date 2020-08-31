<?php

namespace App\Http\Controllers;

use App\Clothing;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;

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
        // $client = new Client();
        // $clothes = $client->request('GET', 'https://therapy-box.co.uk/hackathon/clothing-api.php?username=swapnil')->getBody();

        // $clothes = json_decode($clothes);

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

        return view('home', compact('clothes', 'clothesValues'));
    }
}
