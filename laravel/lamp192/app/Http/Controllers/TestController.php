<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class TestController extends Controller
{
    public function admin()
    {
        // $str = '在模板中使用变量';
        // $a = '<a href="">超链接</a>';

        return view('tests/dashboard');
    }

    public function add()
    {
        return view('tests/add');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\d{6,16}$/',
            'repass' => 'same:password',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1[3578]\d{9}$/'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'password.required' => '密码不能为空',
            'password.regex' => '密码格式不正确',
            'repass.same' => '两次密码不一样',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '手机号格式不正确'

        ]);

        // var_dump($request->all());

        if($request->hasFile('pic')){

            $name = rand(1111,9999).time();

            $aaa = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./upload/', $name.'.'.$aaa);
        }

        $res = $request->except('_token','pic','repass');

        $res['pic'] = '/upload/'.$name.'.'.$aaa;

        $res['password'] = Hash::make($res['password']);

        $bool = DB::table('user')->insert($res);
  
        if ($bool) {
            return view('/tests/show')->with('msg','添加成功');
        } else {
            return back()->withInput();
        }

    }

    public function show(Request $request)
    {
        /*$str = '在模板中使用变量';
        $a = '<a href="">超链接</a>';
        $res = DB::table('stu')->get();
        return view('/homes/show', ['res'=>$res ,'str'=>$str, 'a'=>$a, 'b'=>1]);*/

        // $res = DB::table('user')->get();

        $aaa = $request->except('_token');

        // var_dump($aaa);die;

        $res = DB::table('user')
                ->where('username','like','%'. @$aaa['sousuo'] ?? '' .'%')
                ->orderBy('id','asc')
                ->paginate($aaa['num'] ?? 10);

        return view('/tests/show', ['res'=>$res,'aaa'=>$aaa]);
    }


    public function edit($id)
    {
        // echo $id;

        $res = DB::table('user')->where('id',$id)->first();

        return view('/tests/edit',['res'=>$res]);
    }

    public function update(Request $request, $id)
    {
        // var_dump($request->all());
        // echo $id;

        $res = $request->except('_token');

        $data = DB::table('user')->where('id',$id)->update($res);

        if ($data) {

            return redirect('/test/show')->with('msg','修改成功');
        } else {
            return back();
        }
    }

    public function delete($id)
    {
        echo $id;

        $res = DB::table('user')->where('id',$id)->first();

        $data = unlink('.'.$res->pic);

        $aaa = DB::table('user')->where('id',$id)->delete();

        if($data && $aaa){

            return redirect('/test/show')->with('msg','删除成功');
        } else {
            return back();
        }
    }




    public function db()
    {

        // $res = DB::select('select * from test1');

        // $res = DB::insert('insert into test1(name,age,sex,aihao) value("wwwww", 22, "男" ,"a")');

        // $res = DB::update('update test1 set name="wwwwwwww" where id = 1 ');

        // $res = DB::delete('delete from test1 where id = 1');

        //事务处理
        /*DB::beginTransaction();

        $res1 = DB::update('update money set money=money-1000 where id = 1');

        $res2 = DB::update('update money set money=money+1000 where id = 2');

        if($res1 && $res2){

            DB::commit();
        } else {
            DB::rollback();
        }*/

        // $res = DB::table('money')->insert(['name'=>'wwwww', 'money'=>888888]);

        /*$res = DB::table('money')->insert([
                            ['name'=>'aaaaaa', 'money'=>111111],
                            ['name'=>'bbbbbb', 'money'=>222222],
                            ['name'=>'cccccc', 'money'=>333333]
                        ]);*/
        
        // $res = DB::table('money')->insertGetId(['name'=>'dddddd', 'money'=>4444444]);
        
        // $res = DB::table('money')->where('id',1)->update(['money'=>999999]);

        // $res = DB::table('money')->where('id',9)->delete();

        // $res = DB::table('money')->get();

        // $res = DB::table('money')->where('id',2)->first();

        // $res = DB::table('money')->value('name');

        // $res = DB::table('money')->lists('money');

        // $res = DB::table('money')->orderBy('money','desc')->get();

       /* $res = DB::table('type')
                ->join('typechild', 'type.id','=','typechild.pid')
                ->select('type.id' ,'type.name', 'typechild.childname')
                ->get();
*/      
        $res = DB::table('money')->count();

        $res = DB::table('money')->max('money');

        $res = DB::table('money')->avg('money');

        /*echo '<pre>';
        var_dump($res);

        dd($res);*/

        into();
    }


}
