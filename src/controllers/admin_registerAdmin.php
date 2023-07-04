<?php

require_once('src/model/user.php');

function registerAdmin()
{

    addAdmin();

    require('templates/admin_registerAdmin.php');
}
