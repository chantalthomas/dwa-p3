<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return view('caloricForm');
    }

    public function calculate()
    {
        return view('outcome');
    }
}
