<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){

            $tasks=Task::all();
    
            return datatables()->of($tasks)->addColumn('action',function($data){
    
            return '<div class="actions">
                   <a class="text-black" href="'.route('task.edit',$data->id).'">
                       <i class="feather-edit-3 me-1"></i> Edit
                   </a>
                   <a class="text-danger delete-speciality pointer-link" onclick="pack_del('.$data->id.')" data-id="'.$data->id.'">
                  <i class="feather-trash-2 me-1"></i> Delete
                  </a>
               </div>';
            })->make(true);
    
        }
        return view('task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = new Task();
        return view('task.create',compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $tasks = new Task();
        $tasks->title = $request->title;
        $tasks->details = strip_tags($request->details);
        $tasks->status = 'PENDING';
        $tasks->type = $request->type;
        $tasks->save();
        // dd($tasks);
        return redirect()->route('task.index')->with('success','Task Created Successfully!');

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
        $tasks=Task::find($id);
        return view('task.edit',compact('tasks'));
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
        $tasks = Task::find($id);
        $tasks->title = $request->title;
        $tasks->details = strip_tags($request->details);
        $tasks->status = $request->status;
        $tasks->type = $request->type;
        $tasks->save();
        // dd($tasks);
        return redirect()->route('task.index')->with('success','Task Updated Successfully!');
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
    }
}
