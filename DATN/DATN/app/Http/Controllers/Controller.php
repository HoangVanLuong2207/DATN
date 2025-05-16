<?php

namespace App\Http\Controllers;


use App\Models\Danhmucs;
use App\Models\Sanphams;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('client.home');
    }

public function  danhmuc()
{
    $danhmucs = Danhmucs::with('sanphams')->get();
    $sanpham = Sanphams::take(4)->get();

    return view('client.home', compact('danhmucs','sanpham'));
}

public function show()
{
    $danhmucs = Danhmucs::with('sanphams')->get();
    return view('client.menu', compact('danhmucs'));
}

public function  showsp()
{
    $danhmucs = Danhmucs::with('sanphams')->get();
    $sanpham = Sanphams::take(4)->get();

    return view('client.menu', compact('danhmucs','sanpham'));
}

    public function search(Request $request)
{
    $keyword = $request->input('search');

    $sanpham = Sanphams::where('name', 'LIKE', '%' . $keyword . '%')->get();

    return view('client.search', compact('sanpham', 'keyword'));
}

    public function ctsp($id) {
        $sanpham = Sanphams::find($id);
        return view('client.product-single',compact('sanpham'));
    }
}
