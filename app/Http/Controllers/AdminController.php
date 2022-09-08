<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataSurvey;
use App\Models\Harapan;
use App\Models\Kenyataan;

class AdminController extends Controller
{
    public function index(){
        $data['title'] = "Dashboard";
        $data['id'] = Auth::User()->id;
        $data['nama'] = Auth::User()->nama_user;
        $data['survey'] = DataSurvey::get();

            $harapan = Harapan::get();
            $kenyataan = Kenyataan::get();

            $tidak_harapan = 0;
            $kurang_harapan = 0;
            $sesuai_harapan = 0;
            $sangat_harapan = 0;
            
            foreach ($harapan as $key => $value) {
               $tidak_harapan += $value->tidak_harapan;
               $kurang_harapan += $value->kurang_harapan;
               $sesuai_harapan += $value->sesuai_harapan;
               $sangat_harapan += $value->sangat_harapan;
            }
        $data['tidak_harapan'] = $tidak_harapan;
        $data['kurang_harapan'] = $kurang_harapan;
        $data['sesuai_harapan'] = $sesuai_harapan;
        $data['sangat_harapan'] = $sangat_harapan;
        
            $tidak_kenyataan = 0;
            $kurang_kenyataan = 0;
            $sesuai_kenyataan = 0;
            $sangat_kenyataan = 0;

            foreach ($kenyataan as $key => $value) {
               $tidak_kenyataan += $value->tidak_kenyataan;
               $kurang_kenyataan += $value->kurang_kenyataan;
               $sesuai_kenyataan += $value->sesuai_kenyataan;
               $sangat_kenyataan += $value->sangat_kenyataan;
            }

        $data['tidak_kenyataan'] = $tidak_kenyataan;
        $data['kurang_kenyataan'] = $kurang_kenyataan;
        $data['sesuai_kenyataan'] = $sesuai_kenyataan;
        $data['sangat_kenyataan'] = $sangat_kenyataan;
        
        return view('Admin/admin_home',$data);
    }
    function logout(){
        Auth::logout();
        return \Redirect::to('/');
    }
    public function profileAdmin()
    {
        $data['title'] = "Profile";
        $data['nama'] = Auth::user()->nama_user;
        $id = Auth::user()->id;
        $data['admin'] = User::where('id','=',$id)->first();
        return view('Admin/profile_admin',$data);
    }

    public function updateProfile(Request $request)
    {
           if (empty($request->password)) {
                $data=array(
                    'nama_user'=>$request->nama,
                );
                User::where('id','=',$request->id)->update($data);
                \Session::flash('msg_update_profile','Data Profile Berhasil di Update!');
                return Redirect::route('profile_admin');
           }else{
                $data=array(
                    'nama_user'=>$request->nama,
                    'password'=>bcrypt($request->password),
                );
                User::where('id','=',$request->id)->update($data);
                \Session::flash('msg_update_profile','Data Profile Berhasil di Update!');
                return Redirect::route('profile_admin');
           }
    }
}
