<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Parameter;
use App\Product;
use App\ProductParameter;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();

        $all_categories = Category::all();

        return view('admin.index', compact('categories', 'all_categories'));
    }
    public function showAddProductFromAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();

        $companies = Company::all();

        $category = Category::where('id', $request->get('category'))->first();

        $parameters = Parameter::where('category_id', $request->get('category'))->get();

        return view('admin.addProduct', compact('categories', 'category', 'parameters', 'companies'));
    }

    public function addProductAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        $duplicate = Product::where('name', $request->get('name'))->first();
        if($duplicate == null) {
            $product = new Product([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'photo1' => $request->get('photo1'),
                'photo2' => $request->get('photo2'),
                'photo3' => $request->get('photo3'),
                'company_id' => $request->get('company'),
                'category_id' => $request->get('category'),
                'guarantee' => $request->get('guarantee'),
                'amount' => $request->get('amount'),
            ]);
            $product->save();
            unset($request['name']);
            unset($request['price']);
            unset($request['description']);
            unset($request['photo1']);
            unset($request['photo2']);
            unset($request['photo3']);
            unset($request['company']);
            unset($request['category']);
            unset($request['guarantee']);
            unset($request['amount']);
            $parameters = $request->all();
            foreach ($parameters as $parameter) {
                $new_parameter = new ProductParameter([
                    'product_id' => $product->id,
                    'parameter_id' => array_search($parameter,$parameters),
                    'value' => $parameter,
                ]);
                $new_parameter->save();
            }
            return redirect()->back()->with('message', 'Товар успешнок добавлен!');
        }
        else {
            return redirect()->back()->with('message', 'Такая модель уже есть в магазине!');
        }
    }

    public function addCategoryAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        $duplicate = Category::where('name', $request->get('name'))->first();

        if($duplicate == null) {
            $category = new Category([
                'name' => $request->get('name'),
                'single_name' => $request->get('single_name'),
                'photo' => $request->get('photo'),
            ]);
            $category->save();

            return redirect()->back()->with('message', 'Категория успешно добавлена!');
        }
        else {
            return redirect()->back()->with('message', 'Такая категория уже существует!');
        }
    }

    public function addParameterAction(Request $request)
    {
        $categories = Category::orderBy('categories.id', 'desc')->take(5)->get();
        $duplicate = Parameter::where('name', $request->get('name'))
            ->where('category_id', $request->get('category'))->first();

        if($duplicate == null) {
            $parameter = new Parameter([
                'name' => $request->get('name'),
                'category_id' => $request->get('category'),
            ]);
            $parameter->save();

            return redirect()->back()->with('message', 'Параметр успешно добавлен!');
        }
        else {
            return redirect()->back()->with('message', 'Такой параметр уже существует!');
        }
    }
}
