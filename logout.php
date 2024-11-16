<?php
require('function.php');
removeSessionByName("account");

header("Location: login.php");
exit();
