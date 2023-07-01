<?php

require_once('src/model.php');

function registerMember()
{

    addMember();

    require('templates/admin_registerMember.php');
}
