<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 26/08/2017
 * Time: 12:19 PM
 */
namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Entity\Product;

class BookController extends Controller {
    public function toCategory() {
        $categories = Category::whereNull('parent_id')->get();
        return view('category')->with('categories', $categories);
    }

    public function toProduct($category_id) {
        $products = Product::where('category_id', $category_id)->get();
        return view('product')->with('products', $products);
    }
}