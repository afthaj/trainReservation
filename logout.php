<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_SESSION['passengerID'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  } else if (isset($_SESSION['adminID'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  }

  // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
  setcookie('passengerID', '', time() - 3600);
  setcookie('adminID', '', time() - 3600);
  setcookie('username', '', time() - 3600);
  setcookie('firstname', '', time() - 3600);
  setcookie('lastname', '', time() - 3600);

  // Redirect to the home page
  //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  $home_url = 'http://' . $_SERVER['HTTP_HOST'];
  header('Location: ' . $home_url);
?>
