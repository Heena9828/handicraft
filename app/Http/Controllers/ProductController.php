<?php

    namespace App\Http\Controllers;

    use App\Product;
    use App\Category;
    use App\SubCategory;
    use App\ProductsImage;
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
                'filename' => 'required',
            ]);

            $product = Product::create($request->all());

            foreach ($request->file('filename')as $key => $value)
            {
                $filename = time() . $key . '.' . $value->getClientOriginalExtension();

                $value->move(public_path('photos'), $filename);
                ProductsImage::create([
                    'product_id' => $product->id,
                    'filename' => $filename
                ]);
            }

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
                'filename' => 'required',
            ]);

            $product->update($request->all()); 

            foreach ($request->file('filename') as $key => $value)
            {

                $filename = time() . $key . '.' . $value->getClientOriginalExtension();

                $value->move(public_path('photos'), $filename);
                ProductsImage::create([
                    'product_id' => $product->id,
                    'filename' => $filename
                ]);
            }

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

        public function removeImg($id)
        {

            ProductsImage::find($id)->delete($id);

            return response()->json([
                    'success' => 'Record deleted successfully!'
            ]);
        }

        public function showImages()
        {
            $products = Product::with('productimages')->get();

            return view('products-images', compact('products'));
        }

        public function details($id)
        {
            $pro = Product::with('productimages')->where('id', $id)->get();
//            dd($pro);
            return view('images-description', compact('pro'));
        }

    }
    
