<?php

    namespace App\Http\Controllers;

    use App\SubCategory;
    use Illuminate\Http\Request;
    use App\Category;

    class SubCategoryController extends Controller
    {

        public function index()
        {
            $subcategories = SubCategory::with('categories')->paginate(5);
            return view('admin.subcategory-list', compact('subcategories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_category = Category::all();
            return view('admin.subcategory-add', compact('arr_category'));
        }

        public function store(Request $request)
        {
            request()->validate([
                'sub_category_name' => 'required|unique:subcategories',
                'category_id' => 'required',
            ]);

            $data = [
                SubCategory::Sub_Category_Name => $request->get('sub_category_name'),
                SubCategory::Category_Id => $request->get('category_id')
            ];

            SubCategory::create($data);
            return redirect()->route('subcategories.index')
                    ->with('success', 'Sub Category created successfully');
        }

        public function edit(SubCategory $subcategory)
        {
            $arr_category = Category::all();
            return view('admin.subcategory-edit', compact('subcategory', 'arr_category'));
        }

        public function update(Request $request, SubCategory $subcategory)
        {
            request()->validate([
                'sub_category_name' => 'required',
                'category_id' => 'required',
            ]);

            $data = [
                SubCategory::Sub_Category_Name => $request->get('sub_category_name'),
                SubCategory::Category_Id => $request->get('category_id')
            ];

            $subcategory->update($data);
            return redirect()->route('subcategories.index')
                    ->with('success', 'Sub Category updated successfully');
        }

        public function destroy($id)
        {
            SubCategory::destroy($id);
            return redirect()->route('subcategories.index')
                    ->with('success', 'Sub Category deleted successfully');
        }

    }
    