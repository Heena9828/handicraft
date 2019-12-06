<?php

    namespace App\Http\Controllers;

    use App\Product;
    use App\Category;
    use App\SubCategory;
    use Illuminate\Http\Request;
    use DB;

    class ProductController extends Controller
    {

        public function index()
        {
            $products = Product::with('categories', 'subcategories')->paginate(5);
            return view('admin.product-list', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_category = Category::all();
            $arr_subcategory = SubCategory::all();
            return view('admin.product-add', compact('arr_category', 'arr_subcategory'));
        }

        public function store(Request $request)
        {
            request()->validate([
                'product_name' => 'required',
                'sku' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]);
            Product::create($request->all());
            return redirect()->route('products.index')
                    ->with('success', 'Product created successfully');
        }

        public function show(Product $product)
        {
            //
        }

        public function edit(Product $product)
        {
            $arr_category = Category::all();
            $arr_subcategory = SubCategory::all();
            return view('admin.product-edit', compact('product', 'arr_category', 'arr_subcategory'));
        }

        public function update(Request $request, Product $product)
        {
            request()->validate([
                'product_name' => 'required',
                'sku' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]);

            $product->update($request->all());
            return redirect()->route('products.index')
                    ->with('success', 'Product updated successfully');
        }

        public function destroy($id)
        {
            Product::destroy($id);
            return redirect()->route('products.index')
                    ->with('success', 'Product deleted successfully');
        }

        public function getSubcategory($c_id)
        {
            $subCategory = DB::table("subcategories")
                ->where("category_id", $c_id)
                ->pluck("sub_category_name", "id");
            return response()->json($subCategory);
        }

    }
    