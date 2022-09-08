<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataSurvey;
use App\Models\Kenyataan;
use App\Models\FuzzyfikasiKenyataan;

class DataKenyataanController extends Controller
{
    public function index(){
        $data['title'] = "Data Kenyataan";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['kenyataan'] = Kenyataan::get();
        return view('Admin/data_kenyataan',$data);
    }
    
    public function kelolaKenyataan()
    {
        $cek_kenyataan = FuzzyfikasiKenyataan::where('atribut_kenyataan','=','P1')->first();
        if (empty($cek_kenyataan)) {
            $bawah_tidak = 1;
            $bawah_kurang = 3;
            $bawah_sesuai = 5;
            $bawah_sangat = 7;
            $tengah_tidak = 2.5;
            $tengah_kurang = 4.5;
            $tengah_sesuai = 6.5;
            $tengah_sangat = 8.5;
            $atas_tidak = 4;
            $atas_kurang = 6;
            $atas_sesuai = 8;
            $atas_sangat = 10;

            $p1 = Kenyataan::where('simbol_kenyataan','=','P1')->first();
            $p2 = Kenyataan::where('simbol_kenyataan','=','P2')->first();
            $p3 = Kenyataan::where('simbol_kenyataan','=','P3')->first();
            $p4 = Kenyataan::where('simbol_kenyataan','=','P4')->first();
            $p5 = Kenyataan::where('simbol_kenyataan','=','P5')->first();
            $p6 = Kenyataan::where('simbol_kenyataan','=','P6')->first();
            $p7 = Kenyataan::where('simbol_kenyataan','=','P7')->first();
            $p8 = Kenyataan::where('simbol_kenyataan','=','P8')->first();
            $p9 = Kenyataan::where('simbol_kenyataan','=','P9')->first();

            $c_p1 = (($bawah_tidak*$p1->tidak_kenyataan)+($bawah_kurang*$p1->kurang_kenyataan)+($bawah_sesuai*$p1->sesuai_kenyataan)+($bawah_sangat*$p1->sangat_kenyataan))/$p1->jumlah_kenyataan;
            $a_p1 = (($tengah_tidak*$p1->tidak_kenyataan)+($tengah_kurang*$p1->kurang_kenyataan)+($tengah_sesuai*$p1->sesuai_kenyataan)+($tengah_sangat*$p1->sangat_kenyataan))/$p1->jumlah_kenyataan;
            $b_p1 = (($atas_tidak*$p1->tidak_kenyataan)+($atas_kurang*$p1->kurang_kenyataan)+($atas_sesuai*$p1->sesuai_kenyataan)+($atas_sangat*$p1->sangat_kenyataan))/$p1->jumlah_kenyataan;
            $defuzzyfikasi_p1 = ($a_p1+$b_p1)/2;

            $fuzzyfikasi_p1=array(
                'atribut_kenyataan'=>'P1',
                'c_kenyataan'=>$c_p1,
                'a_kenyataan'=>$a_p1,
                'b_kenyataan'=>$b_p1,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p1
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p1);

            $c_p2 = (($bawah_tidak*$p2->tidak_kenyataan)+($bawah_kurang*$p2->kurang_kenyataan)+($bawah_sesuai*$p2->sesuai_kenyataan)+($bawah_sangat*$p2->sangat_kenyataan))/$p2->jumlah_kenyataan;
            $a_p2 = (($tengah_tidak*$p2->tidak_kenyataan)+($tengah_kurang*$p2->kurang_kenyataan)+($tengah_sesuai*$p2->sesuai_kenyataan)+($tengah_sangat*$p2->sangat_kenyataan))/$p2->jumlah_kenyataan;
            $b_p2 = (($atas_tidak*$p2->tidak_kenyataan)+($atas_kurang*$p2->kurang_kenyataan)+($atas_sesuai*$p2->sesuai_kenyataan)+($atas_sangat*$p2->sangat_kenyataan))/$p2->jumlah_kenyataan;
            $defuzzyfikasi_p2 = ($a_p2+$b_p2)/2;

            $fuzzyfikasi_p2=array(
                'atribut_kenyataan'=>'P2',
                'c_kenyataan'=>$c_p2,
                'a_kenyataan'=>$a_p2,
                'b_kenyataan'=>$b_p2,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p2
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p2);

            $c_p3 = (($bawah_tidak*$p3->tidak_kenyataan)+($bawah_kurang*$p3->kurang_kenyataan)+($bawah_sesuai*$p3->sesuai_kenyataan)+($bawah_sangat*$p3->sangat_kenyataan))/$p3->jumlah_kenyataan;
            $a_p3 = (($tengah_tidak*$p3->tidak_kenyataan)+($tengah_kurang*$p3->kurang_kenyataan)+($tengah_sesuai*$p3->sesuai_kenyataan)+($tengah_sangat*$p3->sangat_kenyataan))/$p3->jumlah_kenyataan;
            $b_p3 = (($atas_tidak*$p3->tidak_kenyataan)+($atas_kurang*$p3->kurang_kenyataan)+($atas_sesuai*$p3->sesuai_kenyataan)+($atas_sangat*$p3->sangat_kenyataan))/$p3->jumlah_kenyataan;
            $defuzzyfikasi_p3 = ($a_p3+$b_p3)/2;

            $fuzzyfikasi_p3=array(
                'atribut_kenyataan'=>'P3',
                'c_kenyataan'=>$c_p3,
                'a_kenyataan'=>$a_p3,
                'b_kenyataan'=>$b_p3,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p3
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p3);

            $c_p4 = (($bawah_tidak*$p4->tidak_kenyataan)+($bawah_kurang*$p4->kurang_kenyataan)+($bawah_sesuai*$p4->sesuai_kenyataan)+($bawah_sangat*$p4->sangat_kenyataan))/$p4->jumlah_kenyataan;
            $a_p4 = (($tengah_tidak*$p4->tidak_kenyataan)+($tengah_kurang*$p4->kurang_kenyataan)+($tengah_sesuai*$p4->sesuai_kenyataan)+($tengah_sangat*$p4->sangat_kenyataan))/$p4->jumlah_kenyataan;
            $b_p4 = (($atas_tidak*$p4->tidak_kenyataan)+($atas_kurang*$p4->kurang_kenyataan)+($atas_sesuai*$p4->sesuai_kenyataan)+($atas_sangat*$p4->sangat_kenyataan))/$p4->jumlah_kenyataan;
            $defuzzyfikasi_p4 = ($a_p4+$b_p4)/2;

            $fuzzyfikasi_p4=array(
                'atribut_kenyataan'=>'P4',
                'c_kenyataan'=>$c_p4,
                'a_kenyataan'=>$a_p4,
                'b_kenyataan'=>$b_p4,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p4
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p4);

            $c_p5 = (($bawah_tidak*$p5->tidak_kenyataan)+($bawah_kurang*$p5->kurang_kenyataan)+($bawah_sesuai*$p5->sesuai_kenyataan)+($bawah_sangat*$p5->sangat_kenyataan))/$p5->jumlah_kenyataan;
            $a_p5 = (($tengah_tidak*$p5->tidak_kenyataan)+($tengah_kurang*$p5->kurang_kenyataan)+($tengah_sesuai*$p5->sesuai_kenyataan)+($tengah_sangat*$p5->sangat_kenyataan))/$p5->jumlah_kenyataan;
            $b_p5 = (($atas_tidak*$p5->tidak_kenyataan)+($atas_kurang*$p5->kurang_kenyataan)+($atas_sesuai*$p5->sesuai_kenyataan)+($atas_sangat*$p5->sangat_kenyataan))/$p5->jumlah_kenyataan;
            $defuzzyfikasi_p5 = ($a_p5+$b_p5)/2;

            $fuzzyfikasi_p5=array(
                'atribut_kenyataan'=>'P5',
                'c_kenyataan'=>$c_p5,
                'a_kenyataan'=>$a_p5,
                'b_kenyataan'=>$b_p5,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p5
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p5);

            $c_p6 = (($bawah_tidak*$p6->tidak_kenyataan)+($bawah_kurang*$p6->kurang_kenyataan)+($bawah_sesuai*$p6->sesuai_kenyataan)+($bawah_sangat*$p6->sangat_kenyataan))/$p6->jumlah_kenyataan;
            $a_p6 = (($tengah_tidak*$p6->tidak_kenyataan)+($tengah_kurang*$p6->kurang_kenyataan)+($tengah_sesuai*$p6->sesuai_kenyataan)+($tengah_sangat*$p6->sangat_kenyataan))/$p6->jumlah_kenyataan;
            $b_p6 = (($atas_tidak*$p6->tidak_kenyataan)+($atas_kurang*$p6->kurang_kenyataan)+($atas_sesuai*$p6->sesuai_kenyataan)+($atas_sangat*$p6->sangat_kenyataan))/$p6->jumlah_kenyataan;
            $defuzzyfikasi_p6 = ($a_p6+$b_p6)/2;

            $fuzzyfikasi_p6=array(
                'atribut_kenyataan'=>'P6',
                'c_kenyataan'=>$c_p6,
                'a_kenyataan'=>$a_p6,
                'b_kenyataan'=>$b_p6,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p6
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p6);

            $c_p7 = (($bawah_tidak*$p7->tidak_kenyataan)+($bawah_kurang*$p7->kurang_kenyataan)+($bawah_sesuai*$p7->sesuai_kenyataan)+($bawah_sangat*$p7->sangat_kenyataan))/$p7->jumlah_kenyataan;
            $a_p7 = (($tengah_tidak*$p7->tidak_kenyataan)+($tengah_kurang*$p7->kurang_kenyataan)+($tengah_sesuai*$p7->sesuai_kenyataan)+($tengah_sangat*$p7->sangat_kenyataan))/$p7->jumlah_kenyataan;
            $b_p7 = (($atas_tidak*$p7->tidak_kenyataan)+($atas_kurang*$p7->kurang_kenyataan)+($atas_sesuai*$p7->sesuai_kenyataan)+($atas_sangat*$p7->sangat_kenyataan))/$p7->jumlah_kenyataan;
            $defuzzyfikasi_p7 = ($a_p7+$b_p7)/2;

            $fuzzyfikasi_p7=array(
                'atribut_kenyataan'=>'P7',
                'c_kenyataan'=>$c_p7,
                'a_kenyataan'=>$a_p7,
                'b_kenyataan'=>$b_p7,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p7
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p7);

            $c_p8 = (($bawah_tidak*$p8->tidak_kenyataan)+($bawah_kurang*$p8->kurang_kenyataan)+($bawah_sesuai*$p8->sesuai_kenyataan)+($bawah_sangat*$p8->sangat_kenyataan))/$p8->jumlah_kenyataan;
            $a_p8 = (($tengah_tidak*$p8->tidak_kenyataan)+($tengah_kurang*$p8->kurang_kenyataan)+($tengah_sesuai*$p8->sesuai_kenyataan)+($tengah_sangat*$p8->sangat_kenyataan))/$p8->jumlah_kenyataan;
            $b_p8 = (($atas_tidak*$p8->tidak_kenyataan)+($atas_kurang*$p8->kurang_kenyataan)+($atas_sesuai*$p8->sesuai_kenyataan)+($atas_sangat*$p8->sangat_kenyataan))/$p8->jumlah_kenyataan;
            $defuzzyfikasi_p8 = ($a_p8+$b_p8)/2;

            $fuzzyfikasi_p8=array(
                'atribut_kenyataan'=>'P8',
                'c_kenyataan'=>$c_p8,
                'a_kenyataan'=>$a_p8,
                'b_kenyataan'=>$b_p8,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p8
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p8);

            $c_p9 = (($bawah_tidak*$p9->tidak_kenyataan)+($bawah_kurang*$p9->kurang_kenyataan)+($bawah_sesuai*$p9->sesuai_kenyataan)+($bawah_sangat*$p9->sangat_kenyataan))/$p9->jumlah_kenyataan;
            $a_p9 = (($tengah_tidak*$p9->tidak_kenyataan)+($tengah_kurang*$p9->kurang_kenyataan)+($tengah_sesuai*$p9->sesuai_kenyataan)+($tengah_sangat*$p9->sangat_kenyataan))/$p9->jumlah_kenyataan;
            $b_p9 = (($atas_tidak*$p9->tidak_kenyataan)+($atas_kurang*$p9->kurang_kenyataan)+($atas_sesuai*$p9->sesuai_kenyataan)+($atas_sangat*$p9->sangat_kenyataan))/$p9->jumlah_kenyataan;
            $defuzzyfikasi_p9 = ($a_p9+$b_p9)/2;

            $fuzzyfikasi_p9=array(
                'atribut_kenyataan'=>'P9',
                'c_kenyataan'=>$c_p9,
                'a_kenyataan'=>$a_p9,
                'b_kenyataan'=>$b_p9,
                'defuzzyfikasi_kenyataan'=> $defuzzyfikasi_p9
            );

            FuzzyfikasiKenyataan::insert($fuzzyfikasi_p9);
            \Session::flash('msg_simpan','Data Fuzzyfikasi Berhasil Ditambah!');
            return \Redirect::back();
        }else{
            \Session::flash('msg_hapus','Pengolahan Data Kenyataan Sudah Dilakukan!');
         return \Redirect::back();
        }
    }
    public function hapusKenyataan()
    {
        Kenyataan::truncate();
        \Session::flash('msg_hapus','Berhasil Menghapus Semua Data Kenyataan!');
        return \Redirect::back();
    }
}
