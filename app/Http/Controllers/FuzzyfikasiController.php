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

class FuzzyfikasiController extends Controller
{
    public function index(){
        $data['title'] = "Data Fuzzyfikasi";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['kenyataan'] = FuzzyfikasiKenyataan::get();
        $data['harapan'] = FuzzyfikasiHarapan::get();
        return view('Admin/data_fuzzyfikasi',$data);
    }

    public function kelolaFuzzyfikasi()
    {
        $cek_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=',"P1")->first();
        $cek_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=',"P1")->first();
        $cek_defuzzyfikasi = Defuzzyfikasi::where('atribut_defuzzyfikasi','=',"P1")->first();

        $p1_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P1')->first();
        $p2_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P2')->first();
        $p3_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P3')->first();
        $p4_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P4')->first();
        $p5_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P5')->first();
        $p6_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P6')->first();
        $p7_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P7')->first();
        $p8_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P8')->first();
        $p9_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P9')->first();

        $p1_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P1')->first();
        $p2_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P2')->first();
        $p3_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P3')->first();
        $p4_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P4')->first();
        $p5_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P5')->first();
        $p6_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P6')->first();
        $p7_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P7')->first();
        $p8_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P8')->first();
        $p9_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P9')->first();

        if (empty($cek_kenyataan && $cek_harapan)) {
            \Session::flash('msg_hapus','Data Fuzzyfikasi Kenyataan Atau Harapan Belum Ada!');
            return \Redirect::back();
        }else{
            if ($cek_defuzzyfikasi) {
                \Session::flash('msg_hapus','Data Defuzzyfikasi Sudah Ada!');
                return \Redirect::back();
            }else{

                $p1_gap = $p1_kenyataan->defuzzyfikasi_kenyataan - $p1_harapan->defuzzyfikasi_harapan;

                $p1=array(
                    'atribut_defuzzyfikasi'=>'P1',
                    'nilai_kenyataan'=>$p1_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p1_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p1_gap,
                );
                Defuzzyfikasi::insert($p1);

                $p2_gap = $p2_kenyataan->defuzzyfikasi_kenyataan - $p2_harapan->defuzzyfikasi_harapan;

                $p2=array(
                    'atribut_defuzzyfikasi'=>'P2',
                    'nilai_kenyataan'=>$p2_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p2_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p2_gap,
                );
                Defuzzyfikasi::insert($p2);

                $p3_gap = $p3_kenyataan->defuzzyfikasi_kenyataan - $p3_harapan->defuzzyfikasi_harapan;

                $p3=array(
                    'atribut_defuzzyfikasi'=>'P3',
                    'nilai_kenyataan'=>$p3_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p3_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p3_gap,
                );
                Defuzzyfikasi::insert($p3);

                $p4_gap = $p4_kenyataan->defuzzyfikasi_kenyataan - $p4_harapan->defuzzyfikasi_harapan;

                $p4=array(
                    'atribut_defuzzyfikasi'=>'P4',
                    'nilai_kenyataan'=>$p4_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p4_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p4_gap,
                );
                Defuzzyfikasi::insert($p4);

                $p5_gap = $p5_kenyataan->defuzzyfikasi_kenyataan - $p5_harapan->defuzzyfikasi_harapan;

                $p5=array(
                    'atribut_defuzzyfikasi'=>'P5',
                    'nilai_kenyataan'=>$p5_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p5_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p5_gap,
                );
                Defuzzyfikasi::insert($p5);

                $p6_gap = $p6_kenyataan->defuzzyfikasi_kenyataan - $p6_harapan->defuzzyfikasi_harapan;

                $p6=array(
                    'atribut_defuzzyfikasi'=>'P6',
                    'nilai_kenyataan'=>$p6_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p6_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p6_gap,
                );
                Defuzzyfikasi::insert($p6);

                $p7_gap = $p7_kenyataan->defuzzyfikasi_kenyataan - $p7_harapan->defuzzyfikasi_harapan;

                $p7=array(
                    'atribut_defuzzyfikasi'=>'P7',
                    'nilai_kenyataan'=>$p7_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p7_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p7_gap,
                );
                Defuzzyfikasi::insert($p7);

                $p8_gap = $p8_kenyataan->defuzzyfikasi_kenyataan - $p8_harapan->defuzzyfikasi_harapan;

                $p8=array(
                    'atribut_defuzzyfikasi'=>'P8',
                    'nilai_kenyataan'=>$p8_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p8_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p8_gap,
                );
                Defuzzyfikasi::insert($p8);

                $p9_gap = $p9_kenyataan->defuzzyfikasi_kenyataan - $p9_harapan->defuzzyfikasi_harapan;

                $p9=array(
                    'atribut_defuzzyfikasi'=>'P9',
                    'nilai_kenyataan'=>$p9_kenyataan->defuzzyfikasi_kenyataan,
                    'nilai_harapan'=>$p9_harapan->defuzzyfikasi_harapan,
                    'gap_defuzzyfikasi'=>$p9_gap,
                );
                Defuzzyfikasi::insert($p9);
                \Session::flash('msg_simpan','Berhasil Melakukan Pengolahan Data Defuzzyfikasi!');
                return \Redirect::back();
            }
        }
    }
    public function hapusFuzzy()
    {
        FuzzyfikasiKenyataan::truncate();
        FuzzyfikasiHarapan::truncate();
        \Session::flash('msg_hapus','Berhasil Menghapus Semua Data Fuzzyfikasi!');
        return \Redirect::back();
    }
}
