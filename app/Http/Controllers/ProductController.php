<?php

namespace App\Http\Controllers;

use App\Category;
use App\CpuType;
use App\Parameter;
use App\Product;
use App\ProductParameter;
use App\Socket;
use App\StorageType;
use App\VideoType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productsAction(Request $request)
    {
        $id = $request->get('category');

        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();

        $category = Category::where('id', $id)->first();

        if($request->get('sort') == "top") {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('category_id', $id)
                ->where('products.amount','>', 0)
                ->orderBy('products.price', 'asc')
                ->paginate(2)
                ->appends(request()->query());
        }
        else if($request->get('sort') == "low") {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('category_id', $id)
                ->where('products.amount','>', 0)
                ->orderBy('products.price', 'desc')
                ->paginate(2)
                ->appends(request()->query());
        }
        else {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('category_id', $id)
                ->where('products.amount','>', 0)
                ->paginate(2)
                ->appends(request()->query());
        }

        $parameters = Parameter::where('category_id', $id)->get();
        foreach ($parameters as $parameter) {
            $parameter->values = ProductParameter::distinct()->where('parameter_id', $parameter->id)->get('value');
        }
        //dd($parameters);
        return view('products.index', compact('categories', 'category', 'products', 'parameters'));
    }

    public function productAction(Request $request)
    {
        $categories = Category::all();

        $id = $request->get('product');

        $product = Product::join('companies', 'companies.id', 'products.company_id')
            ->join('countries', 'countries.id', 'companies.country_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select('products.id', 'products.name', 'products.price', 'products.description',
                'products.guarantee', 'products.amount', 'products.photo1', 'products.photo2', 'products.photo3',
                'categories.single_name as category', 'countries.name as country', 'companies.name as company')
            ->where('products.id', $id)->first();

        $parameters = ProductParameter::join('parameters', 'parameters.id', 'product_parameters.parameter_id')
            ->where('product_parameters.product_id', $id)
            ->select('parameters.name', 'product_parameters.value')->get();

        //dd($parameters);
        return view('products.product', compact('categories', 'product', 'parameters'));
    }

    public function findProductsByNameAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        $name = $request->get('name');
        if($request->get('sort') == "top") {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('products.amount','>', 0)
                ->where('products.name', 'LIKE', "%$name%")
                ->orderBy('products.price', 'asc')
                ->paginate(2)
                ->appends(request()->query());
        }
        else if($request->get('sort') == "low") {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('products.name', 'LIKE', "%$name%")
                ->where('products.amount','>', 0)
                ->orderBy('products.price', 'desc')
                ->paginate(2)
                ->appends(request()->query());
        }
        else {
            $products = Product::join('categories', 'categories.id', 'products.category_id')
                ->select('products.id', 'products.name',
                    'products.photo1', 'products.price', 'products.amount',
                    'categories.single_name as category')
                ->where('products.name', 'LIKE', "%$name%")
                ->where('products.amount','>', 0)
                ->paginate(2)
                ->appends(request()->query());
        }

        return view('products.findProductsByName', compact('categories','products'));
    }

    public function findProductsByFilterAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        $filters = $request->all();
        $values = "product_parameters.value = '".current($filters)."'";
        array_shift($filters);

        foreach ($filters as $filter) {
            $values .= " or product_parameters.value = '". $filter."'";
        }

        $query = 'select distinct products.id, products.name, products.photo1, products.price, products.amount, categories.name as category
        from products inner join categories on products.category_id = categories.id
        inner join product_parameters on products.id = product_parameters.product_id where '.$values;

        $products = DB::select($query);
        //dd($products);

        return view('products.findProductsByFilter', compact('categories','products'));
    }
}
