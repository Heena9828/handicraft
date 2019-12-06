<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {

        public function index()
        {
            $categories = Category::latest()->paginate(5);
            
//            $catId = $categories->
            return view('admin.category-list', compact('categories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            return view('admin.category-add');
        }

        public function store(Request $request)
        {
            request()->validate([
                'category_name' => 'required|unique:categories',
            ]);
            Category::create($request->all());
            return redirect()->route('categories.index')
                    ->with('success', 'Category created successfully');
        }

        public function edit(Category $category)
        {
            return view('admin.category-edit', compact('category'));
        }

        public function update(Request $request, Category $category)
        {
            request()->validate([
                'category_name' => 'required',
            ]);
            $category->update($request->all());
            return redirect()->route('categories.index')
                    ->with('success', 'Category updated successfully');
        }

        public function destroy($id)
        {

            Category::destroy($id);
            return redirect()->route('categories.index')
                    ->with('success', 'Category deleted successfully');
        }

    }
    