<?php
session_start();
$code = $_SESSION['event_code'];
$_SESSION['user_id'] = '';
$_SESSION['mobile'] = '';
$_SESSION['user_type'] = '';
$_SESSION['name'] = '';
$_SESSION['email'] = '';
session_destroy();
session_abort();
session_unset();
// echo $code;exit;
header('Location: login.php?code=' . $code . '&message=logout_successful');
?>