## P3 Peer Review

+ Reviewer's name: Chantal Thomas
+ Reviwee's name: Tara W
+ URL to Reviewe's P3 Github Repo URL: https://github.com/T-Waddell/p3

## 1. Interface
+ I am a fan of gradient that was used and at a glance I also like the  white font against the various blue colors. One thing you may want to consider in the future is visually impaired site visitors. I ran the various background colors and the white font against a color contrast checker and the lighter the blue gets the lower the contrast between the two colors. The lower the contrast the harder it is for visually impaired people to view your content. 

+ Everything is pretty straight forward.

+ I like that there are validations for each field as well as the form as a whole. I also like that the number of weeks is rounded to whole numbers.

+ Just throwing something out there, but for the date field do you want users to be able enter past dates? And if so, maybe you could add some logic that detects when the users enters a past date and have a field generate when users enter a past date and ask if they have already starting saving and enter the amount that they already saved. Just if you wanted to add to the app anymore!  

## 2. Functional testing
+ All fields are required and generate a validation error message if left blank. If any field is left blank the form also produces an overall message `Please correct the errors above.`

+ I tried entering a negative number for the first two form inputs and got the following validation message: `The savings goal must be at least 1.` I think it makes sense that only positive numbers are allowed, and glad you added that restriction.

+ I entered special characters and letters in the first two field and received the following validation message: "The savings goal must be a number." In the future you could think about using:

```html
<input type='number' name='savingsGoal'>
``` 
I think number is more appropriate since you only want a user to enter numbers anyways. I believe there is a step attribute that will allow you to use decimals.

+ I entered 100.15 and 100.75 in the first field and like that the time to save rounds up anything over a whole number.

+ I also entered decimal numbers less than 1 for both of the text field and got the following message `The savings goal must be at least 1.` If a user wanted to save 75 cents, would you want to allow that? Just a thought.

+ I received an expected 404 Error page when trying to access a page that did not exist

## 3. Code: Routes
+There is only route code in the route/web.php file, and it looks pretty clean. You also still have a practice route, from the notes. This should probably be removed. 

## 4. Code: Views
+ Remove practice.blade.php file also

+ Good use of inheritance with master.blade.php

+You repeat similar if statements for validating errors for each field, you could get rid of this by creating something like an error view and using inheritance again in the future. For example:
 
```
@if($errors->get($field))
    <div class='error'>{{ $errors->first($field) }}</div>
@endif
```

```
 @include('modules.field-error', ['field' => 'savingsGoal'])
```

## 5. Code: General
Address as many of the following points as applicable:
+ I think the biggest thing was duplication of code, that I mentioned earlier. Susan mentioned this in the lectures last week, if you're ever repeating lines of code there is a strong possibility that you can create a separate view and use an `@include`

+ When running your code against the W3C Validator, there is a warning
`the date input type is not supported in all browsers. Please be sure to test, and consider using a polyfill.` Did you take this into consideration?  

## 6. Misc
+ I think you should remove the practice code from your Controller code, since it's not related to your project I think it is unnecessary. 