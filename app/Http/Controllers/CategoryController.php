<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        // $adminId = Auth::id(); // working in session
        $adminId = 1; 

        $categories = Category::where('admin_id', $adminId)->get();
    return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        // $adminId = Auth::id(); 
        $adminId = 1; // temarary static 
        

        $category = new Category([
            'category_name' => request('category_name'),
            'admin_id' => $adminId,
        ]);

        $category->save();

        return redirect()->route('categories.index'); // Replace with your actual route name
    }
    public function edit($id){
        
        $adminId = 1; 
    
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->update([
            'category_name' => $request->input('category_name'),
            // Add other fields you want to update
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
}
