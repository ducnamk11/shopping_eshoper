<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {

        return view('category.index', [
            'categories' => Category::latest()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('category.add', [
            'htmlOption' => $this->getCategory($parentId = '')
        ]);
    }


    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('category_index')->with('success', 'Create category successfully!');

    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('category.edit', [
            'category' => $category,
            'htmlOption' => $this->getCategory($category['parent_id'])
        ]);

    }

    public function update(Request $request, $id)
    {
        $category = $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('category_index')->with('success', 'Update category successfully!');
    }

    public function delete($id)
    {
        $this->category->findOrFail($id)->delete();
        return redirect()->route('category_index')->with('success', 'Delete category successfully!');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        return $recusive->categoryRecusive($parentId);
    }

}
