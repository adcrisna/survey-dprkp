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
use Fpdf;

class HasilController extends Controller
{
    public function index(){
        $data['title'] = "Data Hasil";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['hasil'] = Hasil::get();
        return view('Admin/data_hasil',$data);
    }
    public function hapusHasil()
    {
        Hasil::truncate();
        \Session::flash('msg_hapus','Berhasil Menghapus Semua Data Hasil!');
        return \Redirect::back();
    }
    public function printHasil()
    {
        $pdf = new fPdf('P','mm');
		$pdf::SetAutoPageBreak(true);
		$pdf::SetTitle("Laporan Hasil");
		$pdf::addPage('P','A4');
		$pdf::image( asset('logo-dprkp.png'), $pdf::getX()-2, 3, 40 , 28,'PNG');
		$pdf::setX(40);
		$pdf::SetFont('Helvetica','B','13');
		$pdf::cell(135,6,"Data Laporan Hasil Survey",0,2,'C');
		$pdf::SetFont('Helvetica','B','13');
		$pdf::cell(135,6,"Dinas Perumahan Rakyat dan Kawasan Pemukiman",0,2,'C');
		$pdf::SetFont('Helvetica','','10');
		$pdf::cell(135,6,"Jl. Kesambi No. 202, Drajat, Kec. Kesambi, Kota Cirebon, Jawa Barat, 45133",0,2,'C');
		$pdf::SetFont('Helvetica','B','12');
		$pdf::cell(135,6,"",0,2,'C');
		$pdf::line(10,($pdf::getY()+3),200,($pdf::getY()+3));
		$pdf::ln();
		$pdf::ln();
		$pdf::ln();
        $pdf::ln();
		
		$pdf::SetFont('Helvetica','B','11');
		$pdf::cell(45,6,'Dimensi',1,0,'C');
		$pdf::cell(30,6,'Atribut',1,0,'C');
		$pdf::cell(38,6,'Kenyataan',1,0,'C');
		$pdf::cell(38,6,'Harapan',1,0,'C');
		$pdf::cell(40,6,'Gap',1,0,'C');
		$pdf::SetFont('Helvetica','','11');
		$pdf::ln();

			$nama = Auth::User()->nama_user;
            $hasil = Hasil::get();

            $total1 = 0;
            $total2 = 0;
            $total3 = 0;

			foreach ($hasil as $key => $value) {
				$pdf::cell(45,6,$value->dimensi,1,0,'C');
				if ($value->dimensi == "Tangibles") {
					$pdf::Cell(30,6,"P1 | P2",1,0,'');
				}elseif ($value->dimensi == "Reliability") {
					$pdf::Cell(30,6,"P3 | P4 | P5",1,0,'');
				}elseif ($value->dimensi == "Responsiveness") {
					$pdf::Cell(30,6,"P6",1,0,'');
				}elseif ($value->dimensi == "Assurance") {
					$pdf::Cell(30,6,"P7 | P8",1,0,'');
				}elseif ($value->dimensi == "Emphaty") {
					$pdf::Cell(30,6,"P9",1,0,'');
				}else{
					$pdf::cell(30,6,'',1,0,'C');
				}
				
				$pdf::cell(38,6,round($value->hasil_kenyataan,3),1,0,'C');
				$pdf::cell(38,6,round($value->hasil_harapan,3),1,0,'C');
                $pdf::cell(40,6,round($value->hasil_gap,3),1,0,'C');
                $pdf::ln();
                $total1 += $value->hasil_kenyataan;
                $total2 += $value->hasil_harapan;
                $total3 += $value->hasil_gap;
			}
            $pdf::SetFont('Helvetica','B','11');
            $pdf::cell(75,6,'Total',1,0,'C');
            $pdf::cell(38,6,round($total1/5,3),1,0,'C');
            $pdf::cell(38,6,round($total2/5,3),1,0,'C');
            $pdf::cell(40,6,round($total3/5,3),1,0,'C');
			$pdf::ln();
			$pdf::SetFont('Helvetica','B','11');
            $pdf::cell(75,6,'Dengan Hasil',1,0,'C');
			$pdf::cell(38,6,'',1,0,'C');
			$pdf::cell(38,6,'',1,0,'C');
			if (round($total3/5,3) < -1.000) {
				$pdf::cell(40,6,'Tidak Puas',1,0,'C');
			}elseif (round($total3/5,3) <=0.000 && round($total3/5,3) >= -1.000 ) {
				$pdf::cell(40,6,'Kurang Puas',1,0,'C');
			}elseif (round($total3/5,3) >=0.000 && round($total3/5,3) <= 1.000 ) {
				$pdf::cell(40,6,'Cukup Puas',1,0,'C');
			}elseif (round($total3/5,3) > 1.000) {
				$pdf::cell(40,6,'Sangat Puas',1,0,'C');
			}
			$pdf::ln();
			$pdf::ln();
			$pdf::SetFont('Helvetica','','9');
			$pdf::cell(30,6,'Tidak Puas',0,0,'');
			$pdf::cell(35,6,'Kurang Puas',0,0,'');
			$pdf::cell(35,6,'Cukup Puas',0,0,'');
			$pdf::cell(35,6,'Sangat Puas',0,0,'');
			$pdf::ln();
			$pdf::cell(30,6,'< -1.000',0,0,'');
			$pdf::cell(35,6,'<= 0.000 - >= -1.000',0,0,'');
			$pdf::cell(35,6,'>= 0.000 - <= 1.000',0,0,'');
			$pdf::cell(35,6,'> 1.000',0,0,'');
			$pdf::ln();
			$pdf::ln();
			$pdf::cell(65,6,'',0,0,'');
			$pdf::cell(45,6,'',0,0,'');
			$pdf::cell(40,6,'',0,0,'');
			$pdf::cell(40,6,"Cirebon, ".date('d-M-Y'),0,0,'');
			$pdf::ln();
			$pdf::ln();
			$pdf::ln();
			$pdf::ln();
			$pdf::ln();
			$pdf::cell(65,6,'',0,0,'');
			$pdf::cell(45,6,'',0,0,'');
			$pdf::cell(55,6,'',0,0,'');
			$pdf::cell(40,6,$nama,0,0,'');
		$pdf::Output(0);
		exit;
    }
}
