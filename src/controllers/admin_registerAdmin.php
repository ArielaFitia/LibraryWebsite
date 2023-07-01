<?php

require_once('src/model.php');

function registerAdmin()
{

    addAdmin();

    require('templates/admin_registerAdmin.php');
}
