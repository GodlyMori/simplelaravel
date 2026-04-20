<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $allowed = ['GPU','CPU','MOBO','PSU','CASE','PERIPHERALS'];
        $categories = Category::whereIn('category_name', $allowed)->get();

        return view('products.index', [
            'items' => $products,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect('/products');
    }
    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $allowed = ['GPU','CPU','MOBO','PSU','CASE','PERIPHERALS'];
        $categories = Category::whereIn('category_name', $allowed)->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($product);
        }

        return view('products.edit', [
            'item' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect('/products');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect(('/products'));
    }
}