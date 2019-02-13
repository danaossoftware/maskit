<?php
session_id("maskit");
session_start();
if (isset($_SESSION["maskit_user_id"]) && $_SESSION["maskit_user_id"] != "") {
    echo 0;
} else {
    echo -1;
}