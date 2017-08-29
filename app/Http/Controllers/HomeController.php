<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    function index()
		{
			$categoryList = Category::where('parent_id', 0)->with('children')->get();
			$productList = Product::simplePaginate(6);
			return view('home', [
				'headerData' => ['title' => 'Hello', 'descr' => 'Descr', 'keywords' => 'OK,OK,OK'],
				'navbarData' => ['categories' => $categoryList],
				'gridData' => ['title' => 'Products', 'products' => $productList]
			]);
		}
		function bycategory($id)
		{
			$categoryList = Category::where('parent_id', 0)->with('children')->get();
			$category = Category::find($id);
			$productList = Product::where('category_id', $id)->simplePaginate(6);
			return view('home', [
				'headerData' => ['title' => 'Hello', 'descr' => 'Descr', 'keywords' => 'OK,OK,OK'],
				'navbarData' => ['categories' => $categoryList],
				'gridData' => ['title' => 'Products '.$category->name, 'products' => $productList]
			]);
		}
		function search(Request $request)
		{
			$query = $request->input('search');
			$categoryList = Category::where('parent_id', 0)->with('children')->get();
			$category = Category::find($id);
			$productList = Product::where('descr', 'LIKE', '%'.$query.'%')->simplePaginate(6);
			return view('home', [
				'headerData' => ['title' => 'Hello', 'descr' => 'Descr', 'keywords' => 'OK,OK,OK'],
				'navbarData' => ['categories' => $categoryList],
				'gridData' => ['title' => 'Products '.$category->name, 'products' => $productList]
			]);
		}
}
