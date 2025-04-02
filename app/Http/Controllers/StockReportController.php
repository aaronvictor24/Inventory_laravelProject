<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockReport;

class StockReportController extends Controller
{
    public function index()
    {
        // Retrieve all stock reports with product details
        $stockReports = StockReport::with('product')->latest()->get();

        return view('stock_reports', compact('stockReports'));
    }
}

