<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories']  = Category::all();
        return view('categories.categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $this->data['mode']   = 'create';
        $this->data['headline'] = 'Add New Category';
        // dd($this->data);
        return view('categories.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
           [
            'title' => 'string|required',
           ]
        );
       if(Category::create($request->all())){
            Session::flash($request->title.'Addedd Successfully');
       }
       return redirect()->to('categories');
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
        $this->data['category'] = Category::find($id);
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update '.$this->data['category']->title. ' Category';
        return view('categories.form',$this->data);
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
        $request->validate(
            [
             'title' => 'string|required',
            ]
         );
        $category = Category::findOrFail($id);
        if($category->update($request->only('title'))){
            Session::flash('Category updated successfully');
        }
        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Category::find($id)->delete() ) {
            Session::flash('message', 'Category Deleted Successfully');
        }
        
        return redirect()->to('categories');
        
    }
}
