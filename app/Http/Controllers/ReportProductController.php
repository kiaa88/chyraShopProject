<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\product;

class ReportProductController extends Controller
{
    public function index()
{
    return view('product_report', ['title' => 'Laporan Produk']);
}
public function getData(Request $request)
{
    if ($request->ajax()) {
        $products = product::all(); 

        return DataTables::of($products)
            ->addIndexColumn() 
            ->editColumn('harga', function ($row) {
                return 'Rp' . number_format($row->harga, 0, ',', '.'); 
            })
            ->editColumn('discount', function ($row) {
                return $row->discount . '%'; 
            })
            ->rawColumns([]) 
            ->make(true);
    }

    abort(404);
}
}
