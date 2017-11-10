<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //添加用户页面
    public function insert()
    {
        // return redirect()->route('insert');
        // echo 11111111111111111;

        return view('insert');
        // return redirect()->route('del');
    }

    //执行添加的动作
    public function add(Request $request)
    {
        $data = $_POST;

        // var_dump($data);

        array_pop($data);

        // var_dump($data);

        $id = DB::table('stu1')->insertGetId($data);

        if ($id > 0) {

            return redirect()->route('shows');
        }
    }

    //执行删除的方法
    public function delete($id)
    {

        $data = DB::delete('delete from stu1 where id = '.$id);

        var_dump($data);

        if ($data > 0) {

            return redirect()->route('shows');
        }
    }

    //添加修改页面
    public function edit($id)
    {
        $data = DB::select('select * from stu1 where id = '.$id);

        return view('edit',['data'=>$data]);
    }

    //执行修改的方法
    public function update(Request $request)
    {
        $data = $_POST;

        $id = $data['id'];

        array_pop($data);

        array_shift($data);

        // var_dump($data);

        $bool = DB::table('stu1')->where('id', $id)->update($data);

        // var_dump($bool);

        if ($bool > 0) {

            return redirect()->route('shows');
        }
    }

    public function show()
    {   

        $data = DB::select('select * from stu1 order by id');

        return view('show',['data'=>$data]);
    }
}
