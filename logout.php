<?php
require "conn.php";

$func->logout_user();

header('Location: ./');
?>