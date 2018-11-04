<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return view('calculator.caloricForm');
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
    public function mifflinEquation($weight, $feet, $inches, $age)
    {
        global $gender;
        global $exerciseAmount;
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
    }
}



