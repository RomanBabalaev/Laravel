<?php


namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::all(),
            'allowControls' => (bool)Auth::user()->is_admin
        ];
        return view('categories.index', $data);
    }
    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        return view('categories.create');
    }
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $cat = new Category();
        $cat->name = $request->get('name');
        $cat->description = $request->get('description');
        $cat->save();
        return redirect('/categories');
    }
    public function edit($cat_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $data = [
            'category' => Category::find($cat_id)
        ];
        return view('categories.edit', $data);
    }
    public function update($cat_id, Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $cat = Category::find($cat_id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->save();
        return redirect('/categories');
    }
    public function destroy($cat_id)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/categories');
        }
        Category::destroy($cat_id);
        return redirect('/categories');
    }
    public function content($cat_id)
    {
        $category = Category::find($cat_id);
        $data = [
            'category' => $category,
            'title' => 'ГеймсМаркет - ' . $category->name,
            'categories' => Category::all(),
            'products' => Product::where('category_id','=', $category->id)->get()
        ];
        return view('category', $data);
    }
}