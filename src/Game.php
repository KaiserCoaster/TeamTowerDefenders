<?php

class Game {

    private $id;
    private $roomCode;
    private $players;
    
    public function __construct($id, $roomCode, $players) {
        $this->id = $id;
        $this->roomCode = $roomCode;
        $this->players = $players;
    }
    
    public static function joinGame($roomCode, $player) {
        $q = DB::prepare("SELECT * FROM `games` WHERE `roomCode` = ? LIMIT 1");
        $q->execute(array($roomCode));
        if($q->rowCount() == 1) {
            $r = $q->fetch();
            $player->setInGame($r['id']);
            return new Game($r['id'], $r['roomCode'], Player::playersInGame($r['id']));
        }
        else {
            return false;
        }
    }
    
    public static function createGame($player) {
        $roomCode = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $q = DB::prepare("INSERT INTO `games` (`roomCode`) VALUES (?)");
        $q->execute(array($roomCode));
        $id = DB::lastInsertId();
        $q = DB::prepare("INSERT INTO `players`");
        $player->setInGame($id);
        $player->setRole(1);
        return new Game($id, $roomCode, array($player));
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getRoomCode() {
        return $this->roomCode;
    }
    
    public function getPlayers() {
        return $this->players;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function setPlayers($players) {
        $this->players = $players;
    }
    
    public function addPlayer($player) {
        array_push($this->players, $player);
    }
    
    public function removePlayer($player) {
        $pos = array_search($player, $this->players);
        unset($this->players[$pos]);
    }

}

?>