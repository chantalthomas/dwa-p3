<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index(Request $request)
    {
        return view('calculator.caloricForm')->with([
            'feet' => $request->session()->get('feet', ''),
            'inches' => $request->session()->get('inches', ''),
            'weight' => $request->session()->get('weight', ''),
            'age' => $request->session()->get('age', ''),
            'gender' => $request->session()->get('gender', ''),
            'exerciseAmount' => $request->session()->get('exerciseAmount', ''),
        ]);
    }

    #convert weight to kilograms
    public function toKilograms($weight)
    {
        $weightResult = ($weight * 0.453592);

        return $weightResult;
    }

#convert height to centimeters
    public function toCentimeters($feet, $inches)
    {
        $heightResult = (($feet * 12) + $inches) * 2.54;

        return $heightResult;
    }

#Mifflin Equation
    public function mifflinEquation( Request $request)
    {
        #store user input in variable
        $feet = $request->input('feet', null);
        $inches = $request->input('inches', null);
        $weight = $request->input('weight', null);
        $age = $request->input('age', null);
        $gender = $request->input('gender', null);
        $exerciseAmount = $request->input('exerciseAmount', null);

        #if the user is a woman
        if ($gender == 'female') {
            if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.2;

                return $caloricIntake;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.375;

                return $caloricIntake;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.55;

                return $caloricIntake;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.725;

                return $caloricIntake;
            }
            if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.9;

                return $caloricIntake;
            }
        } #if the user is a man
        else {
            if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.2;

                return $caloricIntake;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.375;

                return $caloricIntake;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.55;

                return $caloricIntake;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.725;

                return $caloricIntake;
            } else if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.9;

                return $caloricIntake;
            }
        }

        return redirect('/calculate')->with([
            'feet' => $feet,
            'inches' => $inches,
            'weight' => $weight,
            'age' => $age,
            'gender' => $gender,
            'exerciseAmount' => $exerciseAmount,
        ]);
    }
}



