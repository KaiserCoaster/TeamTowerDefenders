<?php

class Player {
    
    private $id;
    private $inGame;
    private $username;
    private $role;
    
    public function __construct($id, $inGame, $username, $role) {
        $this->id = $id;
        $this->inGame = $inGame;
        $this->username = $username;
        $this->role = $role;
    }
    
    public static function playersInGame($gameID) {
        $q = DB::prepare("SELECT * FROM `players` WHERE `game` = ?");
        $q->execute(array($gameID));
        $players = array();
        while($r = $q->fetch()) {
            array_push($players, new Player($r['id'], $r['game'], $r['username'], $r['role']);
        }
        return $players;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getInGame() {
        return $this->inGame;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function setInGame($inGame) {
        $q = DB::prepare("UPDATE `players` SET `game` = :inGame WHERE `id` = :playerid");
        $q->execute(array(  ":inGame" => $inGame,
                            ":playerid" => $this->id
        ));
        if($q->errorCode() == 0) {
            $this->inGame = $inGame;
        }
    }
    
    public function setUsername($username) {
        $q = DB::prepare("UPDATE `players` SET `username` = :username WHERE `id` = :playerid");
        $q->execute(array(  ":username" => $username,
                            ":playerid" => $this->id
        ));
        if($q->errorCode() == 0) {
            $this->username = $username;
        }
    }
    
    public function setRole($role) {
        $q = DB::prepare("UPDATE `players` SET `role` = :role WHERE `id` = :playerid");
        $q->execute(array(  ":role" => $role,
                            ":playerid" => $this->id
        ));
        if($q->errorCode() == 0) {
            $this->role = $role;
        }
    }

}

?>