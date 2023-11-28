<?php

namespace App\Http\Controllers;

use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdiPtController extends Controller
{
    public function index()
    {
        return view('prodi_perguran_tinggi');
    }
    public function data(Request $request)
    {
        $body = [  
            'act' => 'GetProdi',
            'token' => Shortcut::getToken(),
            'filter' => "",
            'order' => "",
            'limit' => "",
            'offset' => "",
        ];
        $api_response = Http::withOptions(['verify'=>false])
        ->post('http://sim.poltradabali.ac.id:8100/ws/live2.php', $body);
        $response=$api_response->getBody()->getContents();
        $get_contents = json_decode($response);
        return response()->json($get_contents->data);
    }
}
