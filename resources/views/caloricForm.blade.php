@extends('layouts.master')

@section('content')
    <h1>Caloric Calculator</h1>
    <form action='calculateCaloricIntake.php' method='get' class='inputContainer'>
        <fieldset class='form-group'>
            <legend>Height</legend>
            <p>Enter height in feet and inches</p>
            <label>
                <input type='number' name='feet' value='<?php if (isset($feet)) echo $feet ?>'>
            </label>
            <label>
                <input type='number' name='inches' value='<?php if (isset($inches)) echo $inches ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Weight</legend>
            <label>
                <input type='number' name='weight' value='<?php if (isset($weight)) echo $weight ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Age</legend>
            <label>
                <input type='number' name='age' value='<?php if (isset($age)) echo $age ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Gender</legend>
            <input type='radio'
                   name='gender'
                   id='female'
                   value='female' <?php echo (isset($gender) && $gender == 'female') ? 'checked' : ''; ?>>
            <label for='female'>Female</label><br/>
            <input type='radio'
                   name='gender'
                   id='male'
                   value='male' <?php echo (isset($gender) && $gender == 'male') ? 'checked' : ''; ?>>
            <label for='male'>Male</label><br/>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Fitness Level</legend>
            <label>
                <select name="exerciseAmount">
                    <option value='none' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'none') ? 'selected' : ''; ?>>Little to No Exercise</option>
                    <option value='slightly' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'slightly') ? 'selected' : ''; ?>>Slightly Active</option>
                    <option value='moderate' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'moderate') ? 'selected' : ''; ?>>Moderately Active</option>
                    <option value='active' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value='veryActive' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'veryActive') ? 'selected' : ''; ?>>Very Active</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" class='submitButton' name='submit' value='S U B M I T'>
    </form>