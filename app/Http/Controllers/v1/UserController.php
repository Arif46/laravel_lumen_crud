<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $users=User::all();
         return response([
             'status'=>'success',
             'statuscode'=>200,
             'data'=>$users
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storecreate= new User();
        $storecreate->first_name=$request->first_name;
        $storecreate->last_name=$request->last_name;
        $storecreate->email=$request->email;
        $storecreate->password=$request->password;
        $storecreate->save();
        return response([
            'status'=>'success',
            'statuscode'=>200,
            'data'=>'data has been added successfully'
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeupdate=User::find($id);
        $storeupdate->first_name=$request->first_name;
        $storeupdate->last_name=$request->last_name;
        $storeupdate->email=$request->email;
        $storeupdate->save();
        return response([
            'status'=>'success',
            'statuscode'=>200,
            'data'=>'data has been Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdelete=User::find($id);
        $userdelete->delete();
        return response([
            'status'=>'success',
            'statuscode'=>202,
            'data'=>'data has been delete successfully'
        ]);
    }
}
