<?php
session_start();
if ($_SESSION["maskit_user_id"] && $_SESSION["maskit_user_id"] != "") {
    echo 0;
} else {
    echo -1;
}