<?php

namespace App\Http\Controllers;

use App\Category;
use App\CpuType;
use App\Product;
use App\Socket;
use App\StorageType;
use App\VideoType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexAction()
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();

        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->join('companies', 'companies.id', 'products.company_id')
            ->select('products.id', 'products.name', 'products.photo1', 'categories.single_name as category')
            ->where('products.amount','>', 0)
            ->orderBy('products.id', 'desc')->take(5)->get();

        return view('home', compact('categories', 'products'));
    }

    public function allCategoriesAction()
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();;

        $all_categories = Category::paginate(2);

        return view('allCategories', compact('categories', 'all_categories'));
    }
}
