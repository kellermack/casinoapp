<?php

// edit this file to set up local DB info
// this way we don't have to edit our classes or code if our DB info changes
// ideally this would NOT be in the repo so that changes for one environment don't get committed to everyone else
// but i'm doing it like this right now for simplicity

$dbConfig = [
    'server' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'database' => 'vegaspoker',
];