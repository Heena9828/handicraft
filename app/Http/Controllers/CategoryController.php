<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;
    use Validator;
    use Laravel\Passport\HasApiTokens;
    use Illuminate\Support\Facades\Redirect;
    use App\Rules\Checkvalidation;

    class CategoryController extends Controller
    {

        public function index()
        {
            $categories = Category::latest()->paginate(5);
            return view('admin.category-list', compact('categories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            return view('admin.category-add');
        }

        public function store(Request $request)
        {
//            $this->validate(request(), [
//                'category_name' => [new Checkvalidation]
//            ]);

            $rules = [
                'category_name' => 'required|unique:categories'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator);
            }

            $data = [
                Category::CATEGORY_NAME => $request->get('category_name')
            ];

            Category::create($data);
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

            $data = [
                Category::CATEGORY_NAME => $request->get('category_name')
            ];

            $category->update($data);
            return redirect()->route('categories.index')
                    ->with('success', 'Category updated successfully');
        }

        public function destroy($id)
        {

            Category::destroy($id);
            return redirect()->route('categories.index')
                    ->with('success', 'Category deleted successfully');
        }

//        public function userExists()
//        {
//            $user = Category::all()->lists('category_name');
//            if (in_array(Input::get('category_name'), $user))
//            {
//                return Response::json(Input::get('category_name') . ' is already taken');
//            }
//            else
//            {
//                return Response::json(Input::get('category_name') . ' Username is available');
//            }
//        }
    }
    