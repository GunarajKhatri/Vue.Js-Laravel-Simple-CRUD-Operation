<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class formController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('hello');
    }
    public function showing()
    {  
        return Form::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request,[
            "username"=>"required|max:20",
            "email"=>"required|email|unique:forms",
            "password"=>"required|unique:forms|min:8"
        ]);
        $form=new Form;
        $form->username=$request->username;
        $form->password=$request->password;
        $form->email=$request->email;
        $form->save();
        return $form;
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
        $this->validate($request,[
            "username"=>"required|max:20",
            "email"=>"required|email"
            
        ]);
        $form=Form::find($request->id);
        $form->username=$request->username;
        $form->email=$request->email;
       
        $form->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form::where('id',$id)->delete();

    }
}
