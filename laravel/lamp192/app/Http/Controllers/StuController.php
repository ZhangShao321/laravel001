<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class StuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ccc = DB::table('stu')->get();

        return view('admins.show', ['ccc'=>$ccc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = $request->except('_token');

        // var_dump($data);

        if($request->hasFile('pic')){

            $request->file('pic')->getClientOriginalExtension();

            $pic = rand(1111,1111).time();

            $request->file('pic')->move('./uploads/', $pic.'.'.'jpg');

            array_pop($data);

            $data['pic'] = '/uploads/'.$pic.'.'.'jpg';

            // var_dump($data);
            $aaa = DB::table('stu')->insert($data);

            if($aaa){

                return redirect('/admin/stu');
            } else {
                return view('/admin/stu/create');
            }


        } else {

            $bbb = DB::table('stu')->insertGetId($data);

            if($bbb){

                return redirect('/admin/stu');
            } else {
                return view('/admin/stu/create');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = DB::table('stu')->where('id', $id)->first();

        return view('/admins/edit', ['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token', '_method');

        // var_dump($data);
        // echo $id;

        if($request->hasFile('pic')){

            $request->file('pic')->getClientOriginalExtension();

            $pic = rand(1111,1111).time();

            $request->file('pic')->move('./uploads/', $pic.'.'.'jpg');

            array_pop($data);

            $data['pic'] = '/uploads/'.$pic.'.'.'jpg';

            // var_dump($data);
            $aaa = DB::table('stu')->where('id',$id)->update($data);

            if($aaa){

                return redirect('/admin/stu');
            } else {
                return view('/admin/stu/create');
            }


        } else {

            $bbb = DB::table('stu')->where('id', $id)->update($data);

            if($bbb){

                return redirect('/admin/stu');
            } else {
                return view('/admin/stu/create');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = DB::table('stu')->where('id', $id)->delete();

        if($res){

            return redirect('/admin/stu');
        } else {
            return view('/admin/stu/create');
        }
    }
}
