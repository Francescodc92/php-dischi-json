<?php 
header("Access-Control-Allow-Origin: *");

$disksFile = file_get_contents('./database/songs.json');

header("Content-Type: application/json");

echo ($disksFile);