<?php

    namespace App\Http\Controllers;

    use App\Product;
    use App\Category;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {

        public function index()
        {
            $products = Product::with('categories')->paginate(5);
            return view('admin.product-list', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_subcategories = Category::all();
            return view('admin.product-add', compact('arr_subcategories'));
        }

       
        public function store(Request $request)
        {
            request()->validate([
                'product_name' => 'required',
                'sku' => 'required',
                'price' => 'required',
                'description' => 'required',
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
            //
        }

        
        public function update(Request $request, Product $product)
        {
            //
        }

        public function destroy(Product $product)
        {
            //
        }

    }
    