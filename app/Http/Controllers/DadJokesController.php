<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DadJokesController extends Controller {

    /**
     * Return listing of jokes
     */
    public function index() {
        $term = request()->query('term');
        $page = request()->query('page');
        $limit = request()->query('limit');
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->get('https://icanhazdadjoke.com/search?term='.$term.'&page='.$page.'&limit='.$limit);
        if($response->successful()) {
            return response($response->body(), 200)->header('Content-Type', 'application/json');
        } else {
            return response()->json('Something went wrong', 400);
        }
    }
}
