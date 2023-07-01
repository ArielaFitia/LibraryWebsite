<?php

require_once('src/model/member.php');

function registerMember()
{

    addMember();

    require('templates/admin_registerMember.php');
}
