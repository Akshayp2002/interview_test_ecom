<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $categories = Category::all();
            $selectedCategoryId = $request->input('category_id');
            if ($selectedCategoryId) {
                $products = Product::where('status', 1)->where('category_id', $selectedCategoryId)->get();
            } else {
                $products = Product::where('status', 1)->get();
            }
            return view('user.dashboard', compact('products', 'categories', 'selectedCategoryId'));
        } catch (Exception $e) {
            //handle error pending
        }
    }
}
