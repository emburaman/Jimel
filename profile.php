<?php
// profile.php

function profile($chars)
{
    // We check if $chars is an Integer (ie. an ID) or a String (ie. a potential username)

    if (is_int($chars)) {
        // $id = $chars;
        // Do the SQL to get the $user from his ID
        // ........
    } else {
        // $username = mysqli_real_escape_string($char);
        // Do the SQL to get the $user from his username
        // ...........
    }

    // Render your view with the $user variable
    // .........
}

function myProfile()
{
    // Get the currently logged-in user ID from the session :
    $id = 'emburaman';

    // Run the above function :
    profile($id);
}

?>