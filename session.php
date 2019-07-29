<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the login page
    header("Location: $_SERVER[SCRIPT_NAME]?page=login");
}
?>