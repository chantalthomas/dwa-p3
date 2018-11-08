@extends('layouts.master')

@section('content')

    <h1>Caloric Calculator</h1>
    <form action='/calculate-process/' method='get' class='inputContainer'>
        <fieldset class='form-group'>
            <legend>Height</legend>
            <p>Enter height in feet and inches</p>
            <label>
                <input type='number' name='feet' id='feet' value='{{ old('feet') }}'>
                @include('modules.field-error', ['field' => 'feet'])
            </label>
            <label>
                <input type='number' name='inches' id='inches' value='{{ old('inches') }}'>
                @include('modules.field-error', ['field' => 'inches'])
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Weight</legend>
            <label>
                <input type='number' name='weight' id='weight' value='{{ old('weight') }}'>
                @include('modules.field-error', ['field' => 'weight'])
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Age</legend>
            <label>
                <input type='number' name='age' id='age' value='{{ old('age') }}'>
                @include('modules.field-error', ['field' => 'age'])
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Gender</legend>
            <input type='radio' name='gender' id='female' value='female' {{(old('gender') == 'female') ? 'checked' : '' }}>
            <label for='female'>Female</label><br/>
            <input type='radio' name='gender' id='male' value='male' {{(old('gender') == 'male') ? 'checked' : '' }}>
            <label for='male'>Male</label><br/>
            @include('modules.field-error', ['field' => 'gender'])
        </fieldset>
        <fieldset class='form-group'>
            <legend>Fitness Level</legend>
            <label>
                <div class='dropdown'>
                    <select name="exerciseAmount">
                        <option value='none' {{(old('exerciseAmount') == 'none') ? 'selected' : '' }}>Little to No Exercise</option>
                        <option value='slightly' {{(old('exerciseAmount') == 'slightly') ? 'selected' : '' }}>Slightly Active</option>
                        <option value='moderate' {{(old('exerciseAmount') == 'moderate') ? 'selected' : '' }}>Moderately Active</option>
                        <option value='active' {{(old('exerciseAmount') == 'active') ? 'selected' : '' }}>Active</option>
                        <option value='veryActive' {{(old('exerciseAmount') == 'veryActive') ? 'selected' : '' }}>Very Active</option>
                    </select>
                </div>
                @include('modules.field-error', ['field' => 'exerciseAmount'])
            </label>
        </fieldset>
        <input type="submit" class='submitButton' name='submit' value='S U B M I T'>
    </form>

    <div class='outputContainer'>
        @if($caloricIntake !=0)
            Your caloric intake is: {{round($caloricIntake, 0)}}
        @endif
    </div>
    @if(count($errors) > 0)
        <ul class='alert alert-danger'>
            Please correct the errors above.
        </ul>
    @endif
@endsection