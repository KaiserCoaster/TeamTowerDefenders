<?php

include_once("../src/Config.php");
include_once("../src/DB.php");
include_once("../src/Game.php");
include_once("../src/Player.php");

$username = $_GET['username'];

$p = Player::create($username, 1);
$g = Game::createGame($p);
if($g) {
    echo json_encode(array("created"=>true, "roomCode"=>$g->getRoomCode()));
}
else {
    echo json_encode(array("created"=>false));
}