<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Category;
use App\CpuType;
use App\Product;
use App\Socket;
use App\StorageType;
use App\VideoType;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function addProductToBasketAction(Request $request)
    {
        $product = Product::where('id', $request->get('product'))->first();
        $product->amount -= $request->get('amount');
        $product->save();
        $basket = new Basket([
            'product_id' => $request->get('product'),
            'product_amount' => $request->get('amount'),
            'user_id' => Auth::user()->id,
            'add_date' => date("Y-m-d"),
        ]);
        $basket->save();

        if($product->amount == 0) {

            return redirect()->route('home')->with('message', 'Последний товар был добавлен в корзину!');
        }

        return redirect()->back()->with('message', 'Товар добавлен в корзину!');
    }

    public function basketAction()
    {
        $categories = Category::all();

        $products = Basket::join('products', 'products.id', 'basket.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select('products.id as product', 'products.name', 'basket.id',
                'products.photo1', 'products.price', 'basket.product_amount as amount',
                'categories.single_name as category')
            ->where('basket.user_id', Auth::user()->id)->paginate(2)
            ->appends(request()->query());

        return view('basket', compact('products', 'categories'));
    }

    public function deleteProductFromBasketAction(Request $request)
    {
        $basket = Basket::where('id', $request->get('basket'))->first();
        $product = Product::where('id', $request->get('product'))->first();
        if($basket->product_amount == $request->get('amount')) {
            $basket->delete();
        }
        else {
            $basket->product_amount -= $request->get('amount');
            $basket->save();
        }
        $product->amount += $request->get('amount');
        $product->save();
        return redirect()->back()->with('message', 'Товар удален из корзины!');
    }
}
