<?php

namespace App\Http\Controllers;

use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfilPtController extends Controller
{
    public function index()
    {
        $body = [  
            'act' => 'GetProfilPT',
            'token' => Shortcut::getToken(),
            'filter' => "",
            'order' => "",
            'limit' => "",
            'offset' => "",
        ];
        $api_response = Http::withOptions(['verify'=>false])
        ->post(env('API_ENDPOINT'), $body);
        $response=$api_response->getBody()->getContents();
        $get_contents = json_decode($response);
        $data['jumlah'] = $get_contents->jumlah;
        $data['dt_profil'] = $get_contents->data;
        return view('profil_pt', $data);
    }
}
