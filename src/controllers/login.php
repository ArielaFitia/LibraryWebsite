<?php

require_once('src/model.php');

function logged()
{

    login();

    require('templates/login.php');
}
