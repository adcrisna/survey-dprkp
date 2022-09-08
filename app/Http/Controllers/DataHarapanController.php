<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataSurvey;
use App\Models\Harapan;
use App\Models\FuzzyfikasiHarapan;

class DataHarapanController extends Controller
{
    public function index(){
        $data['title'] = "Data Harapan";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['harapan'] = Harapan::get();
        return view('Admin/data_harapan',$data);
    }
    public function simpanHarapan(Request $request)
		{
			$data=array(
				'simbol_harapan'=>$request->simbol_harapan,
                'tidak_harapan'=>$request->tidak,
                'kurang_harapan'=>$request->kurang,
                'sesuai_harapan'=>$request->sesuai,
                'sangat_harapan'=>$request->sangat,
                'jumlah_harapan'=>$request->jumlah
			);
			Harapan::insert($data);
			\Session::flash('msg_simpan','Data Harapan Berhasil Ditambah!');
			return \Redirect::back();
		}
	public function hapusHarapan(Request $request)
		{
			$data = Harapan::where('harapan_id','=',$request->harapan_id);
			$query = $data->first();
			$data->delete();
	        \Session::flash('msg_hapus','Data Harapan Berhasil Dihapus!');
			return \Redirect::back();
		}
	public function editHarapan(Request $request)
	{
			$data=array(
				'simbol_harapan'=>$request->simbol_harapan,
                'tidak_harapan'=>$request->tidak,
                'kurang_harapan'=>$request->kurang,
                'sesuai_harapan'=>$request->sesuai,
                'sangat_harapan'=>$request->sangat,
                'jumlah_harapan'=>$request->jumlah
			);
			Harapan::where('harapan_id','=',$request->harapan_id)->update($data);
			\Session::flash('msg_update','Data Harapan Berhasil Diupdate!');
			return Redirect::back();
	}

	public function kelolaHarapan()
    {
        $cek_harapan = FuzzyfikasiHarapan::where('atribut_harapan','=','P1')->first();
        if (empty($cek_harapan)) {
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

            $p1 = Harapan::where('simbol_harapan','=','P1')->first();
            $p2 = Harapan::where('simbol_harapan','=','P2')->first();
            $p3 = Harapan::where('simbol_harapan','=','P3')->first();
            $p4 = Harapan::where('simbol_harapan','=','P4')->first();
            $p5 = Harapan::where('simbol_harapan','=','P5')->first();
            $p6 = Harapan::where('simbol_harapan','=','P6')->first();
            $p7 = Harapan::where('simbol_harapan','=','P7')->first();
            $p8 = Harapan::where('simbol_harapan','=','P8')->first();
            $p9 = Harapan::where('simbol_harapan','=','P9')->first();

            $c_p1 = (($bawah_tidak*$p1->tidak_harapan)+($bawah_kurang*$p1->kurang_harapan)+($bawah_sesuai*$p1->sesuai_harapan)+($bawah_sangat*$p1->sangat_harapan))/$p1->jumlah_harapan;
            $a_p1 = (($tengah_tidak*$p1->tidak_harapan)+($tengah_kurang*$p1->kurang_harapan)+($tengah_sesuai*$p1->sesuai_harapan)+($tengah_sangat*$p1->sangat_harapan))/$p1->jumlah_harapan;
            $b_p1 = (($atas_tidak*$p1->tidak_harapan)+($atas_kurang*$p1->kurang_harapan)+($atas_sesuai*$p1->sesuai_harapan)+($atas_sangat*$p1->sangat_harapan))/$p1->jumlah_harapan;
            $defuzzyfikasi_p1 = ($a_p1+$b_p1)/2;

            $fuzzyfikasi_p1=array(
                'atribut_harapan'=>'P1',
                'c_harapan'=>$c_p1,
                'a_harapan'=>$a_p1,
                'b_harapan'=>$b_p1,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p1
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p1);

            $c_p2 = (($bawah_tidak*$p2->tidak_harapan)+($bawah_kurang*$p2->kurang_harapan)+($bawah_sesuai*$p2->sesuai_harapan)+($bawah_sangat*$p2->sangat_harapan))/$p2->jumlah_harapan;
            $a_p2 = (($tengah_tidak*$p2->tidak_harapan)+($tengah_kurang*$p2->kurang_harapan)+($tengah_sesuai*$p2->sesuai_harapan)+($tengah_sangat*$p2->sangat_harapan))/$p2->jumlah_harapan;
            $b_p2 = (($atas_tidak*$p2->tidak_harapan)+($atas_kurang*$p2->kurang_harapan)+($atas_sesuai*$p2->sesuai_harapan)+($atas_sangat*$p2->sangat_harapan))/$p2->jumlah_harapan;
            $defuzzyfikasi_p2 = ($a_p2+$b_p2)/2;

            $fuzzyfikasi_p2=array(
                'atribut_harapan'=>'P2',
                'c_harapan'=>$c_p2,
                'a_harapan'=>$a_p2,
                'b_harapan'=>$b_p2,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p2
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p2);

            $c_p3 = (($bawah_tidak*$p3->tidak_harapan)+($bawah_kurang*$p3->kurang_harapan)+($bawah_sesuai*$p3->sesuai_harapan)+($bawah_sangat*$p3->sangat_harapan))/$p3->jumlah_harapan;
            $a_p3 = (($tengah_tidak*$p3->tidak_harapan)+($tengah_kurang*$p3->kurang_harapan)+($tengah_sesuai*$p3->sesuai_harapan)+($tengah_sangat*$p3->sangat_harapan))/$p3->jumlah_harapan;
            $b_p3 = (($atas_tidak*$p3->tidak_harapan)+($atas_kurang*$p3->kurang_harapan)+($atas_sesuai*$p3->sesuai_harapan)+($atas_sangat*$p3->sangat_harapan))/$p3->jumlah_harapan;
            $defuzzyfikasi_p3 = ($a_p3+$b_p3)/2;

            $fuzzyfikasi_p3=array(
                'atribut_harapan'=>'P3',
                'c_harapan'=>$c_p3,
                'a_harapan'=>$a_p3,
                'b_harapan'=>$b_p3,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p3
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p3);

            $c_p4 = (($bawah_tidak*$p4->tidak_harapan)+($bawah_kurang*$p4->kurang_harapan)+($bawah_sesuai*$p4->sesuai_harapan)+($bawah_sangat*$p4->sangat_harapan))/$p4->jumlah_harapan;
            $a_p4 = (($tengah_tidak*$p4->tidak_harapan)+($tengah_kurang*$p4->kurang_harapan)+($tengah_sesuai*$p4->sesuai_harapan)+($tengah_sangat*$p4->sangat_harapan))/$p4->jumlah_harapan;
            $b_p4 = (($atas_tidak*$p4->tidak_harapan)+($atas_kurang*$p4->kurang_harapan)+($atas_sesuai*$p4->sesuai_harapan)+($atas_sangat*$p4->sangat_harapan))/$p4->jumlah_harapan;
            $defuzzyfikasi_p4 = ($a_p4+$b_p4)/2;

            $fuzzyfikasi_p4=array(
                'atribut_harapan'=>'P4',
                'c_harapan'=>$c_p4,
                'a_harapan'=>$a_p4,
                'b_harapan'=>$b_p4,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p4
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p4);

            $c_p5 = (($bawah_tidak*$p5->tidak_harapan)+($bawah_kurang*$p5->kurang_harapan)+($bawah_sesuai*$p5->sesuai_harapan)+($bawah_sangat*$p5->sangat_harapan))/$p5->jumlah_harapan;
            $a_p5 = (($tengah_tidak*$p5->tidak_harapan)+($tengah_kurang*$p5->kurang_harapan)+($tengah_sesuai*$p5->sesuai_harapan)+($tengah_sangat*$p5->sangat_harapan))/$p5->jumlah_harapan;
            $b_p5 = (($atas_tidak*$p5->tidak_harapan)+($atas_kurang*$p5->kurang_harapan)+($atas_sesuai*$p5->sesuai_harapan)+($atas_sangat*$p5->sangat_harapan))/$p5->jumlah_harapan;
            $defuzzyfikasi_p5 = ($a_p5+$b_p5)/2;

            $fuzzyfikasi_p5=array(
                'atribut_harapan'=>'P5',
                'c_harapan'=>$c_p5,
                'a_harapan'=>$a_p5,
                'b_harapan'=>$b_p5,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p5
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p5);

            $c_p6 = (($bawah_tidak*$p6->tidak_harapan)+($bawah_kurang*$p6->kurang_harapan)+($bawah_sesuai*$p6->sesuai_harapan)+($bawah_sangat*$p6->sangat_harapan))/$p6->jumlah_harapan;
            $a_p6 = (($tengah_tidak*$p6->tidak_harapan)+($tengah_kurang*$p6->kurang_harapan)+($tengah_sesuai*$p6->sesuai_harapan)+($tengah_sangat*$p6->sangat_harapan))/$p6->jumlah_harapan;
            $b_p6 = (($atas_tidak*$p6->tidak_harapan)+($atas_kurang*$p6->kurang_harapan)+($atas_sesuai*$p6->sesuai_harapan)+($atas_sangat*$p6->sangat_harapan))/$p6->jumlah_harapan;
            $defuzzyfikasi_p6 = ($a_p6+$b_p6)/2;

            $fuzzyfikasi_p6=array(
                'atribut_harapan'=>'P6',
                'c_harapan'=>$c_p6,
                'a_harapan'=>$a_p6,
                'b_harapan'=>$b_p6,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p6
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p6);

            $c_p7 = (($bawah_tidak*$p7->tidak_harapan)+($bawah_kurang*$p7->kurang_harapan)+($bawah_sesuai*$p7->sesuai_harapan)+($bawah_sangat*$p7->sangat_harapan))/$p7->jumlah_harapan;
            $a_p7 = (($tengah_tidak*$p7->tidak_harapan)+($tengah_kurang*$p7->kurang_harapan)+($tengah_sesuai*$p7->sesuai_harapan)+($tengah_sangat*$p7->sangat_harapan))/$p7->jumlah_harapan;
            $b_p7 = (($atas_tidak*$p7->tidak_harapan)+($atas_kurang*$p7->kurang_harapan)+($atas_sesuai*$p7->sesuai_harapan)+($atas_sangat*$p7->sangat_harapan))/$p7->jumlah_harapan;
            $defuzzyfikasi_p7 = ($a_p7+$b_p7)/2;

            $fuzzyfikasi_p7=array(
                'atribut_harapan'=>'P7',
                'c_harapan'=>$c_p7,
                'a_harapan'=>$a_p7,
                'b_harapan'=>$b_p7,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p7
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p7);

            $c_p8 = (($bawah_tidak*$p8->tidak_harapan)+($bawah_kurang*$p8->kurang_harapan)+($bawah_sesuai*$p8->sesuai_harapan)+($bawah_sangat*$p8->sangat_harapan))/$p8->jumlah_harapan;
            $a_p8 = (($tengah_tidak*$p8->tidak_harapan)+($tengah_kurang*$p8->kurang_harapan)+($tengah_sesuai*$p8->sesuai_harapan)+($tengah_sangat*$p8->sangat_harapan))/$p8->jumlah_harapan;
            $b_p8 = (($atas_tidak*$p8->tidak_harapan)+($atas_kurang*$p8->kurang_harapan)+($atas_sesuai*$p8->sesuai_harapan)+($atas_sangat*$p8->sangat_harapan))/$p8->jumlah_harapan;
            $defuzzyfikasi_p8 = ($a_p8+$b_p8)/2;

            $fuzzyfikasi_p8=array(
                'atribut_harapan'=>'P8',
                'c_harapan'=>$c_p8,
                'a_harapan'=>$a_p8,
                'b_harapan'=>$b_p8,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p8
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p8);

            $c_p9 = (($bawah_tidak*$p9->tidak_harapan)+($bawah_kurang*$p9->kurang_harapan)+($bawah_sesuai*$p9->sesuai_harapan)+($bawah_sangat*$p9->sangat_harapan))/$p9->jumlah_harapan;
            $a_p9 = (($tengah_tidak*$p9->tidak_harapan)+($tengah_kurang*$p9->kurang_harapan)+($tengah_sesuai*$p9->sesuai_harapan)+($tengah_sangat*$p9->sangat_harapan))/$p9->jumlah_harapan;
            $b_p9 = (($atas_tidak*$p9->tidak_harapan)+($atas_kurang*$p9->kurang_harapan)+($atas_sesuai*$p9->sesuai_harapan)+($atas_sangat*$p9->sangat_harapan))/$p9->jumlah_harapan;
            $defuzzyfikasi_p9 = ($a_p9+$b_p9)/2;

            $fuzzyfikasi_p9=array(
                'atribut_harapan'=>'P9',
                'c_harapan'=>$c_p9,
                'a_harapan'=>$a_p9,
                'b_harapan'=>$b_p9,
                'defuzzyfikasi_harapan'=> $defuzzyfikasi_p9
            );

            FuzzyfikasiHarapan::insert($fuzzyfikasi_p9);

            \Session::flash('msg_simpan','Data Fuzzyfikasi Berhasil Ditambah!');
            return \Redirect::back();
        }else{
            \Session::flash('msg_hapus','Pengolahan Data Harapan Sudah Dilakukan!');
         return \Redirect::back();
        }
    }
}
