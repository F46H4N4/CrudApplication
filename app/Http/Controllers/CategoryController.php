<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return view('categories.index', ['Categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();

      return view('categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name']); // Get data from the request
         Category::create($data);
         Session::flash('message', 'Category created successfully');

         return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return View('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            $rules = [
                'name' => 'required',
               
            ];
            
            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return redirect()->route('categories.create')
                    ->withErrors($validator);
            } else {
               $category = Category::find($id);
                if ($category) {
                    $category->update([
                          'name' => $request->input('name'),
                    ]);
            
                    Session::flash('message', 'category updated successfully');
                } 
                else {
                    Session::flash('message', 'category does not exist');
                }
            
                return redirect()->route('categories.index');
            }
                  
     }
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('message', 'category deleted successfully');
        return redirect()->route('categories.index');
             
    }
}
