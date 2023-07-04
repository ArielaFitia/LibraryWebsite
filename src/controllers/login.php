<?php

require_once('src/model/user.php');

function logged()
{

    login();

    require('templates/login.php');
}
