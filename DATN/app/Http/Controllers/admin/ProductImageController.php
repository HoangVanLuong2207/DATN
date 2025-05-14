<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\Size;
use App\Models\Topping;
use Illuminate\Support\Facades\Storage;
class ProductImageController extends Controller
{
    public function index() {
        $product_images = ProductImage::with(['sanpham', 'size', 'topping'])->paginate(10);
        return view('admin.bienthe.index',compact('product_images'));
    }

public function create()
{
    $sanpham = sanpham::all();
    $sizes = Size::all();
    $toppings = Topping::all();
    return view('admin.bienthe.image', compact('sanpham', 'sizes', 'toppings'));
}

public function store(Request $request)
{
    $path = $request->file('image')->store('uploads', 'public');

    ProductImage::create([
        'product_id' => $request->product_id,
        'size_id' => $request->size_id ?? null,
        'topping_id' => $request->topping_id ?? null,
        'image_url' => $path,
        'is_primary' => $request->has('is_primary'),
    ]);

    return redirect()->route('product-images.index')->with('success', 'Thêm ảnh thành công!');
}

}
