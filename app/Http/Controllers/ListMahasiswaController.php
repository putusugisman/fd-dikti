<?php

namespace App\Http\Controllers;

use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListMahasiswaController extends Controller
{
    public function index()
    {
        if (isset($_REQUEST['tahun']) && $_REQUEST['tahun']){
            $data['tahun'] = $_REQUEST['tahun'];
        }else{
            $data['tahun'] = date('Y');
        }
        return view('list_data_mahasiswa', $data);
    }
    public function data(Request $request)
    {
        $body = [  
            'act' => 'GetListMahasiswa',
            'token' => Shortcut::getToken(),
            'filter' => "id_periode ='".$request->tahun."1'",
            'order' => "nim",
            'limit' => "",
            'offset' => "",
        ];
        $api_response = Http::withOptions(['verify'=>false])
        ->post('http://sim.poltradabali.ac.id:8100/ws/live2.php', $body);
        $response=$api_response->getBody()->getContents();
        $get_contents = json_decode($response);
        $data = [];
        foreach($get_contents->data as $row){
            $data[] = [
                "id_registrasi_mahasiswa" => $row->id_registrasi_mahasiswa,
                "id_mahasiswa" => $row->id_mahasiswa,
                "nim" => $row->nim,
                "nama_mahasiswa" => $row->nama_mahasiswa,
                "jenis_kelamin" => $row->jenis_kelamin,
                "tanggal_lahir" => $row->tanggal_lahir,
                "id_perguruan_tinggi" => $row->id_perguruan_tinggi,
                "nipd" => $row->nipd,
                "id_sms" => $row->id_sms,
                "id_agama" =>  $row->id_agama,
                "nama_agama" => $row->nama_agama,
                "id_prodi" => $row->id_prodi,
                "nama_program_studi" => $row->nama_program_studi,
                "nama_status_mahasiswa" => $row->nama_status_mahasiswa,
                "id_periode" => $row->id_periode,
                "nama_periode_masuk" => $row->nama_periode_masuk,
            ];
        }
        return response()->json($data);
    }
}
