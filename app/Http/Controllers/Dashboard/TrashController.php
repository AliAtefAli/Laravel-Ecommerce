<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $products = Product::onlyTrashed()->get();
        $categories = Category::onlyTrashed()->get();
        $orders = Order::onlyTrashed()->get();
        $coupons = Coupon::onlyTrashed()->get();

        return view('dashboard.trash.index', compact('products', 'categories', 'orders', 'coupons'));
    }

    public function restore($id, $type)
    {
        if ($type == 'product') {
            Product::withTrashed()->find($id)->restore();

            return back();
        } else if ($type == 'category') {
            Category::withTrashed()->find($id)->restore();

            return back();
        }
    }

    public function destroy($id, $type)
    {
        if ($type == 'product') {
            $product = Product::withTrashed()->find($id);
            // Delete the image
            $old_images = Image::where('imageable_id', $product->id)->get();
            // Delete from the asset
            foreach ($old_images as $old_image) {
                if (file_exists(public_path('assets/images/products/' . $old_image->path))) {
                    unlink(public_path('assets/images/products/' . $old_image->path));
                }
                // Delete from database
                $old_image->delete();
            }


            return back();
        } else if ($type == 'category') {
            Category::withTrashed()->find($id)->forceDelete();

            return back();
        }
    }
}
