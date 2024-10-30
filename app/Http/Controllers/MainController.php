<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Option;
use App\Models\Product;



class MainController extends Controller
{
    public function index()
    {
        $logo = Option::query()->select('logo')->orderByDesc('updated_at')->limit(1)->get();

        $products = Product::all();

        return view('main', compact('logo', 'products'));
    }
}
