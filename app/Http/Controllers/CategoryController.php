<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;
    use Validator;
    use Laravel\Passport\HasApiTokens;

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

//        public function store(Request $request)
//        {
//            request()->validate([
//                'category_name' => 'required|unique:categories',
//            ]);
//            Category::create($request->all());
//            return redirect()->route('categories.index')
//                    ->with('success', 'Category created successfully');
//        }

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

        public function get(Request $request)
        {
            ///Validation

            $validator = Validator::make($request->all(), [
                    'category_name' => 'required',
            ]);
            if ($validator->fails())
            {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $input = $request->all();
            $user = Category::create($input);
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }

        public function store(Request $request)
        {
            $rules = [
                'category_name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return response()->json($validator->errors(), 400);
            }
 
            $user = Category::create($request->all());
            
            return redirect()->route('categories.index')
                    ->with('success', 'Category created successfully');
        }

    }
    