<?php

// edit this file to set up local DB info
// this way we don't have to edit our classes or code if our DB info changes
// ideally this would NOT be in the repo so that changes for one environment don't get committed to everyone else
// but i'm doing it like this right now for simplicity

// config values are returned to they can be assigned to a variable with $config = include(thisfile)
// see: https://www.abeautifulsite.net/a-better-way-to-write-config-files-in-php for more info

return [
    'server' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'vegaspoker',
];
