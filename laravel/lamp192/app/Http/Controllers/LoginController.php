<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use DB;
use Session;
use Hash;

class LoginController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function login(Request $request)
    {
        $res = $request->except('_token');

        // var_dump($res);

        $aaa = DB::table('user')->where('username',$res['username'])->first();

        // var_dump($aaa);
        if(!$aaa){

            return redirect('/admin/login')->with('msg','用户名或密码不正确');
        }

        if(!Hash::check($res['password'],$aaa->password)){

            return redirect('/admin/login')->with('msg','用户名或密码不正确');
        }

        if($res['code'] != session('vcode')){
            return redirect('/admin/login')->with('msg','验证码不正确');
        }

        session(['id'=>$aaa->id]);

        return redirect('/test/admin');
    }

    public function code()
    {

        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 120, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash('vcode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

    }

    public function picedit($id)
    {

        // $id = session('id');

        $res = DB::table('user')->where('id',$id)->first();

        return view('/login/picedit', ['res'=>$res]);
    }

    public function picupdate(Request $request,$id)
    {
        // echo $id;
        // $res = $request->all();

        // var_dump($res);

        if($request->hasFile('pic')){

            $name = rand(1111,9999).time();

            $aaa = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./upload/', $name.'.'.$aaa);
        }
        $arr = array();
        $arr['pic'] =  '/upload/'. $name.'.'.$aaa;

        $aaa = DB::table('user')->where('id',$id)->first();

        $bbb = @unlink('.'.$aaa->pic);
        // var_dump($arr);

        $data = DB::table('user')->where('id',$id)->update($arr);

        if($data){

            return redirect('/test/show');
        }else{
            return back();
        }
    }

    public function passedit($id)
    {

        // $id = session('id');

        $res = DB::table('user')->where('id',$id)->first();

        return view('/login/passedit', ['res'=>$res]);
    }

    public function passupdate(Request $request,$id)
    {
        // echo $id;
        
        $res = $request->except('_token');

        if($res['password'] != $res['repass']){

            return back();
        }

        $res['password'] = Hash::make($res['password']);
        array_pop($res);
        // var_dump($res);die;

        $data = DB::table('user')->where('id',$id)->update($res);

        if($data){

            return redirect('/test/show');
        }else{
            return back();
        }

       
    }

    public function quit(Request $request)
    {   
        $data = $request->session()->forget('id');

        if($data){ 
            
            return redirect('/admin/login');
        }else{

            return back();
        }
    }
}
