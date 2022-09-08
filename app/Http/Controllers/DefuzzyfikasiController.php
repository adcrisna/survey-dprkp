<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataSurvey;
use App\Models\Kenyataan;
use App\Models\Harapan;
use App\Models\FuzzyfikasiKenyataan;
use App\Models\FuzzyfikasiHarapan;
use App\Models\Defuzzyfikasi;
use App\Models\Hasil;

class DefuzzyfikasiController extends Controller
{
    public function index(){
        $data['title'] = "Data Defuzzyfikasi";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['defuzzyfikasi'] = Defuzzyfikasi::get();
        return view('Admin/data_defuzzyfikasi',$data);
    }

    public function kelolaDefuzzyfikasi()
    {
        $cek_defuzzyfikasi = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P1")->first();
        $cek_hasil = Hasil::where('dimensi','=',"Tangibles")->first();
        if (empty($cek_defuzzyfikasi)) {
            \Session::flash('msg_hapus','Data Defuzzyfikasi Belum Ada!');
            return \Redirect::back();
        }elseif ($cek_hasil) {
            \Session::flash('msg_hapus','Data Hasil Sudah Ada!');
            return \Redirect::back();
        }else{
            $p1 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P1")->first();
            $p2 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P2")->first();
            $p3 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P3")->first();
            $p4 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P4")->first();
            $p5 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P5")->first();
            $p6 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P6")->first();
            $p7 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P7")->first();
            $p8 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P8")->first();
            $p9 = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P9")->first();

            $tangibles_kenyataan = ($p1->nilai_kenyataan + $p2->nilai_kenyataan)/2;
            $tangibles_harapan = ($p1->nilai_harapan + $p2->nilai_harapan)/2;
            $gap = $tangibles_kenyataan-$tangibles_harapan;

            $data_tangibles = array(
                'dimensi' => 'Tangibles',
                'hasil_kenyataan'=> $tangibles_kenyataan,
                'hasil_harapan'=> $tangibles_harapan,
                'hasil_gap'=> $gap
            );
            Hasil::insert($data_tangibles);

            $reliability_kenyataan = ($p3->nilai_kenyataan + $p4->nilai_kenyataan + $p5->nilai_kenyataan)/3;
            $reliability_harapan = ($p3->nilai_harapan + $p4->nilai_harapan + $p5->nilai_harapan)/3;
            $gap_reliability = $reliability_kenyataan-$reliability_harapan;

            $data_reliability = array(
                'dimensi' => 'Reliability',
                'hasil_kenyataan'=> $reliability_kenyataan,
                'hasil_harapan'=> $reliability_harapan,
                'hasil_gap'=> $gap_reliability
            );
            Hasil::insert($data_reliability);

            $gap_res = $p6->nilai_kenyataan - $p6->nilai_harapan;

            $data_res = array(
                'dimensi' => 'Responsiveness',
                'hasil_kenyataan'=>  $p6->nilai_kenyataan,
                'hasil_harapan'=> $p6->nilai_harapan,
                'hasil_gap'=> $gap_res
            );
            Hasil::insert($data_res);

            $assur_kenyataan = ($p7->nilai_kenyataan + $p8->nilai_kenyataan)/2;
            $assur_harapan = ($p7->nilai_harapan + $p8->nilai_harapan)/2;
            $gap_assur = $assur_kenyataan-$assur_harapan;

            $data_assur = array(
                'dimensi' => 'Assurance',
                'hasil_kenyataan'=> $assur_kenyataan,
                'hasil_harapan'=> $assur_harapan,
                'hasil_gap'=> $gap_assur
            );
            Hasil::insert($data_assur);

            $gap_emp = $p9->nilai_kenyataan - $p9->nilai_harapan;

            $data_emp = array(
                'dimensi' => 'Emphaty',
                'hasil_kenyataan'=>  $p9->nilai_kenyataan,
                'hasil_harapan'=> $p9->nilai_harapan,
                'hasil_gap'=> $gap_emp
            );
            Hasil::insert($data_emp);
            \Session::flash('msg_simpan','Berhasil Membuat Data Hasil Survey!');
            return \Redirect::back();
        }
    }
    public function hapusDefuzzy()
    {
        Defuzzyfikasi::truncate();
        \Session::flash('msg_hapus','Berhasil Menghapus Semua Data Defuzzyfikasi!');
        return \Redirect::back();
    }
}
