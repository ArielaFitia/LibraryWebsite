<?php

require_once('src/model/user.php');

function registerMember()
{

    addMember();

    require('templates/admin_registerMember.php');
}
