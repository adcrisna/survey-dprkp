<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataSurvey;
use App\Models\Kenyataan;

class DataSurveyController extends Controller
{
    public function index(){
        $data['title'] = "Data Survey";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['survey'] = DataSurvey::orderByDesc('data_survey_id')->get();
        return view('Admin/data_survey',$data);
    }

    public function hapusSurvey(Request $request)
    {
        $data = DataSurvey::where('data_survey_id','=',$request->data_survey_id);
		$query = $data->first();
		$data->delete();
	    \Session::flash('msg_hapus','Data Survey Berhasil Dihapus!');
		return \Redirect::back();
    }

    public function kelolaSurvey()
    {
        $cek_kenyataan = Kenyataan::where('simbol_kenyataan','=','P1')->first();
        if (empty($cek_kenyataan)) {
            $p1_tidak = DataSurvey::where('p1','=',1)->get();
            $p1_kurang = DataSurvey::where('p1','=',2)->get();
            $p1_sesuai = DataSurvey::where('p1','=',3)->get();
            $p1_sangat = DataSurvey::where('p1','=',4)->get();
            $p1_jumlah= count($p1_tidak) + count($p1_kurang) + count($p1_sesuai) + count($p1_sangat);
            
            $data_p1=array(
                'simbol_kenyataan'=>'P1',
                'tidak_kenyataan'=>count($p1_tidak),
                'kurang_kenyataan'=>count($p1_kurang),
                'sesuai_kenyataan'=>count($p1_sesuai),
                'sangat_kenyataan'=>count($p1_sangat),
                'jumlah_kenyataan'=>$p1_jumlah
            );
            Kenyataan::insert($data_p1);

            $p2_tidak = DataSurvey::where('p2','=',1)->get();
            $p2_kurang = DataSurvey::where('p2','=',2)->get();
            $p2_sesuai = DataSurvey::where('p2','=',3)->get();
            $p2_sangat = DataSurvey::where('p2','=',4)->get();
            $p2_jumlah= count($p2_tidak) + count($p2_kurang) + count($p2_sesuai) + count($p2_sangat);
            
            $data_p2=array(
                'simbol_kenyataan'=>'P2',
                'tidak_kenyataan'=>count($p2_tidak),
                'kurang_kenyataan'=>count($p2_kurang),
                'sesuai_kenyataan'=>count($p2_sesuai),
                'sangat_kenyataan'=>count($p2_sangat),
                'jumlah_kenyataan'=>$p2_jumlah
            );
            Kenyataan::insert($data_p2);

            $p3_tidak = DataSurvey::where('p3','=',1)->get();
            $p3_kurang = DataSurvey::where('p3','=',2)->get();
            $p3_sesuai = DataSurvey::where('p3','=',3)->get();
            $p3_sangat = DataSurvey::where('p3','=',4)->get();
            $p3_jumlah= count($p3_tidak) + count($p3_kurang) + count($p3_sesuai) + count($p3_sangat);
            
            $data_p3=array(
                'simbol_kenyataan'=>'P3',
                'tidak_kenyataan'=>count($p3_tidak),
                'kurang_kenyataan'=>count($p3_kurang),
                'sesuai_kenyataan'=>count($p3_sesuai),
                'sangat_kenyataan'=>count($p3_sangat),
                'jumlah_kenyataan'=>$p3_jumlah
            );
            Kenyataan::insert($data_p3);

            $p4_tidak = DataSurvey::where('p4','=',1)->get();
            $p4_kurang = DataSurvey::where('p4','=',2)->get();
            $p4_sesuai = DataSurvey::where('p4','=',3)->get();
            $p4_sangat = DataSurvey::where('p4','=',4)->get();
            $p4_jumlah= count($p4_tidak) + count($p4_kurang) + count($p4_sesuai) + count($p4_sangat);
            
            $data_p4=array(
                'simbol_kenyataan'=>'P4',
                'tidak_kenyataan'=>count($p4_tidak),
                'kurang_kenyataan'=>count($p4_kurang),
                'sesuai_kenyataan'=>count($p4_sesuai),
                'sangat_kenyataan'=>count($p4_sangat),
                'jumlah_kenyataan'=>$p4_jumlah
            );
            Kenyataan::insert($data_p4);

            $p5_tidak = DataSurvey::where('p5','=',1)->get();
            $p5_kurang = DataSurvey::where('p5','=',2)->get();
            $p5_sesuai = DataSurvey::where('p5','=',3)->get();
            $p5_sangat = DataSurvey::where('p5','=',4)->get();
            $p5_jumlah= count($p5_tidak) + count($p5_kurang) + count($p5_sesuai) + count($p5_sangat);
            
            $data_p5=array(
                'simbol_kenyataan'=>'P5',
                'tidak_kenyataan'=>count($p5_tidak),
                'kurang_kenyataan'=>count($p5_kurang),
                'sesuai_kenyataan'=>count($p5_sesuai),
                'sangat_kenyataan'=>count($p5_sangat),
                'jumlah_kenyataan'=>$p5_jumlah
            );
            Kenyataan::insert($data_p5);

            $p6_tidak = DataSurvey::where('p6','=',1)->get();
            $p6_kurang = DataSurvey::where('p6','=',2)->get();
            $p6_sesuai = DataSurvey::where('p6','=',3)->get();
            $p6_sangat = DataSurvey::where('p6','=',4)->get();
            $p6_jumlah= count($p6_tidak) + count($p6_kurang) + count($p6_sesuai) + count($p6_sangat);
            
            $data_p6=array(
                'simbol_kenyataan'=>'P6',
                'tidak_kenyataan'=>count($p6_tidak),
                'kurang_kenyataan'=>count($p6_kurang),
                'sesuai_kenyataan'=>count($p6_sesuai),
                'sangat_kenyataan'=>count($p6_sangat),
                'jumlah_kenyataan'=>$p6_jumlah
            );
            Kenyataan::insert($data_p6);

            $p7_tidak = DataSurvey::where('p7','=',1)->get();
            $p7_kurang = DataSurvey::where('p7','=',2)->get();
            $p7_sesuai = DataSurvey::where('p7','=',3)->get();
            $p7_sangat = DataSurvey::where('p7','=',4)->get();
            $p7_jumlah= count($p7_tidak) + count($p7_kurang) + count($p7_sesuai) + count($p7_sangat);
            
            $data_p7=array(
                'simbol_kenyataan'=>'P7',
                'tidak_kenyataan'=>count($p7_tidak),
                'kurang_kenyataan'=>count($p7_kurang),
                'sesuai_kenyataan'=>count($p7_sesuai),
                'sangat_kenyataan'=>count($p7_sangat),
                'jumlah_kenyataan'=>$p7_jumlah
            );
            Kenyataan::insert($data_p7);

            $p8_tidak = DataSurvey::where('p8','=',1)->get();
            $p8_kurang = DataSurvey::where('p8','=',2)->get();
            $p8_sesuai = DataSurvey::where('p8','=',3)->get();
            $p8_sangat = DataSurvey::where('p8','=',4)->get();
            $p8_jumlah= count($p8_tidak) + count($p8_kurang) + count($p8_sesuai) + count($p8_sangat);
            
            $data_p8=array(
                'simbol_kenyataan'=>'P8',
                'tidak_kenyataan'=>count($p8_tidak),
                'kurang_kenyataan'=>count($p8_kurang),
                'sesuai_kenyataan'=>count($p8_sesuai),
                'sangat_kenyataan'=>count($p8_sangat),
                'jumlah_kenyataan'=>$p8_jumlah
            );
            Kenyataan::insert($data_p8);

            $p9_tidak = DataSurvey::where('p9','=',1)->get();
            $p9_kurang = DataSurvey::where('p9','=',2)->get();
            $p9_sesuai = DataSurvey::where('p9','=',3)->get();
            $p9_sangat = DataSurvey::where('p9','=',4)->get();
            $p9_jumlah= count($p9_tidak) + count($p9_kurang) + count($p9_sesuai) + count($p9_sangat);
            
            $data_p9=array(
                'simbol_kenyataan'=>'P9',
                'tidak_kenyataan'=>count($p9_tidak),
                'kurang_kenyataan'=>count($p9_kurang),
                'sesuai_kenyataan'=>count($p9_sesuai),
                'sangat_kenyataan'=>count($p9_sangat),
                'jumlah_kenyataan'=>$p9_jumlah
            );
            Kenyataan::insert($data_p9);
            \Session::flash('msg_simpan','Data Kenyataan Berhasil Ditambah!');
            return \Redirect::back();
        }else{
            \Session::flash('msg_hapus','Pengolahan Data Survey Sudah Dilakukan!');
         return \Redirect::back();
        }
    }
}
