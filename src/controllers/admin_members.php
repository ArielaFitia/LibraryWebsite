<?php

require_once('src/model.php');

function admin_members()
{

    $members = getMembers();

    require('templates/admin_members.php');
}
