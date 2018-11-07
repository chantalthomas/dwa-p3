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
            'caloricIntake' => $request->session()->get('caloricIntake',''),
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
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.375;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.55;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.725;
            }
            else if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.9;
            }
        } #if the user is a man
        else {
            if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.2;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.375;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.55;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.725;
            } else if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.9;
            }
        }
        #redirect back to form page
        return redirect('/calculate')->with([
            'feet' => $feet,
            'inches' => $inches,
            'weight' => $weight,
            'age' => $age,
            'gender' => $gender,
            'exerciseAmount' => $exerciseAmount,
            'caloricIntake' => $caloricIntake,
        ]);
    }
    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'feet' => 'required|digits',
            'inches' => 'required|digits',
            'weight' => 'required|digits',
            'age' => 'required|digits',
            'gender' => 'required',
            'exerciseAmount' => 'required'
        ]);
    }
}