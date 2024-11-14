<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET"){
    
    echo "Bye :D";

    // Clear all cookies

    if (!empty($_COOKIE)) {
        foreach ($_COOKIE as $cookie_name => $cookie_value) {
            setcookie($cookie_name, "", time() - 3600, "/"); // Set cookie expiration to the past
      }
    }

   // Clear session data
    session_start();            // Continues the Session
    $_SESSION = [];             // Clear all session variables
    session_unset();            // Unset session data
    session_destroy();          // Destroy the session

    // Redirect to the login page
    exit();
}
?>
