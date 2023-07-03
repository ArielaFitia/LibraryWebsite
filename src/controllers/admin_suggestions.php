<?php

require_once('src/model.php');

function adminSuggestions()
{

    $suggestions = getSuggestions();

    require('templates/admin_suggestions.php');
}
