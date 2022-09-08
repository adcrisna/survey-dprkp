<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\DataSurvey;
use Auth;
use App\Models\User;

class ApiSurveyController extends Controller
{
    public function insertDataSurvey(Request $request)
    {
        if (!empty($request->nama_lengkap && $request->phone && $request->jenis_kelamin && $request->umur && $request->pekerjaan && $request->p1 && $request->p2 && $request->p3 && $request->p4 && $request->p5 && $request->p6 && $request->p7 && $request->p8 && $request->p9 )) {
            $survey=array(
                'nama_lengkap'=>$request->nama_lengkap,
                'no_hp'=>$request->phone,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'umur'=>$request->umur,
                'jenis_pelayanan'=> "Perpanjangan Sewa Petak Makam dan Sewa Petak Makam Cadangan",
                'pekerjaan' => $request->pekerjaan,
                'p1'=>$request->p1,
                'p2'=>$request->p2,
                'p3'=>$request->p3,
                'p4'=>$request->p4,
                'p5'=>$request->p5,
                'p6'=>$request->p6,
                'p7'=>$request->p7,
                'p8'=>$request->p8,
                'p9'=>$request->p9,
                'kritik_saran'=>$request->kritik_saran,
                'created_at'=> date("Y-m-d H-i-s")
            );
            DataSurvey::insert($survey);
            return response()->json(array([
                    'status' => 'success',
                    'apimessage' => "Data Survey Berhasil Dikirim, Terima Kasih"
            ]),200);
        }else{
            return response()->json(array([
                'status' => 'failed',
                'apimessage' => "Masukan Semua Data Survey!!"
        ]),200);
        }
    }
}
