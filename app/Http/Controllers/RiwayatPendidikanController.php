<?php

namespace App\Http\Controllers;

use App\Helpers\Shortcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RiwayatPendidikanController extends Controller
{
    public function index()
    {
        if (isset($_REQUEST['tahun']) && $_REQUEST['tahun']){
            $data['tahun'] = $_REQUEST['tahun'];
        }else{
            $data['tahun'] = date('Y');
        }
        return view('riwayat_pendidikan_mahasiswa', $data);
    }
    public function data(Request $request)
    {
        $body = [  
            'act' => 'GetListRiwayatPendidikanMahasiswa',
            'token' => Shortcut::getToken(),
            'filter' => "id_periode_masuk ='".$request->tahun."1'",
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
                "nama_jenis_daftar" => $row->nama_jenis_daftar,
                "id_jenis_daftar" => $row->id_jenis_daftar,
                "id_periode_masuk" =>$row->id_periode_masuk,
                "nama_periode_masuk" => $row->nama_periode_masuk,
                "id_perguruan_tinggi" => $row->id_perguruan_tinggi,
                "nama_perguruan_tinggi" => $row->nama_perguruan_tinggi,
                "id_prodi" => $row->id_prodi,
                "nama_program_studi" => $row->nama_program_studi,
                "jenis_kelamin" => $row->jenis_kelamin,
                "tanggal_daftar" =>$row->tanggal_daftar,
                "nama_ibu_kandung" => $row->nama_ibu_kandung,
                "biaya_masuk" => $row->biaya_masuk,
            ];
        }
        // dd($data);
        return response()->json($data);
    }
}
