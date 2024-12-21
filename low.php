<?php

if (isset($GET['Submit'])) {
    // Get input
    $id = $_GET['id'];

    // Check database
    $getid = "SELECT first_name, last_name from users WHERE user_id = '$id';";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $getid); // Remove 'or die' to suppress mysql errors

    // Get results
    $num = @mysqli_num_rows($result); // @ to suppress errors
    if ($num > 0) {
        // Feedback for end user
        $html .= '<pre>User ID exists in database.</pre>';
    }
    else {
        // User wasn't found,, so the page wasn't
        header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');

        // Feedback for end user
        $html .= '<pre>User ID is missing from database.</pre>'
    }

    ((is_null($___mysqli_res = mysqli_close(&$GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>
