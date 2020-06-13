<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function indexAction()
    {
        $categories = Category::all();
        $text = '';
        $counts = '';
        foreach ($categories as $category){
            $text .= '"'.$category->name .'",';

            $value = Basket::join('products', 'products.id', 'basket.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->where('categories.id', $category->id)->sum('basket.product_amount');

            $counts .= $value .',';
        };
        return view('statistic',compact('text','counts', 'categories'));;
    }

    public function statByParamAction(Request $request)
    {
        $categories = Category::all();
        $text = '';
        $counts = '';
        foreach ($categories as $category){
            $text .= '"'.$category->name .'",';

            $value = Basket::join('products', 'products.id', 'basket.product_id')
                ->join('categories', 'categories.id', 'products.category_id')
                ->where('categories.id', $category->id)
                ->where('basket.add_date', '>', $request->get('date1'))
                ->where('basket.add_date', '<', $request->get('date2'))
                ->sum('basket.product_amount');

            $counts .= $value .',';
        };

        return view('statistic',compact('text','counts', 'categories'));;
    }
    public function defFormAction()
    {
        $categories = Category::all();

        return view('def', compact('categories'));
    }
    public function defenceAction(Request $request)
    {
        $categories = Category::all();
        $date = $request->get('month');
        $date = new Carbon($date);

        $basket = Basket::join('products', 'products.id', 'basket.product_id')
            ->join('categories', 'categories.id', 'products.category_id')
            ->select('categories.name', Basket::raw('SUM(basket.product_amount) AS sum'))
            ->whereMonth('add_date', $date->month)
            ->whereYear('add_date', $date->year)
            ->groupBY('categories.name')
            ->get();

        return view('defence', compact('basket', 'categories'));
    }
}
