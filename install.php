<?php
/**
 * This file will install the database table and import the data
 *
 * Run by visiting in the browser or by executing `php install.php` in the command line
 */

require('Database.class.php');

$db = new Database();
echo "Starting import...\n";
$db->install();
echo "Done\n";