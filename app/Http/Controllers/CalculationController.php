<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return 'Complete the form below';
    }

    public function calculate($caloricIntake)
    {
        return 'Your recommended caloric intake is: ' .$caloricIntake;
    }
}
