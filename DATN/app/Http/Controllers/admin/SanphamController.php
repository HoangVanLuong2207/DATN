<?php

namespace App\Http\Controllers\admin;

use App\Models\sanpham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\Sanctum;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanpham = Sanpham::with('danhmuc')->get();
        return view('admin.sanpham.index', ['sanpham' => $sanpham]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sanpham $sanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sanpham $sanpham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sanpham $sanpham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sanpham $sanpham)
    {
        //
    }
}
