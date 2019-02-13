<?php
session_id("maskit");
session_start();
echo $_SESSION["maskit_user_id"];