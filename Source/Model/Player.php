<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class Player{

    private $id;
    private $accountId;
    private $name;
    private $job;
    private $playTime;
    private $level;
    private $gold;
    private $ip;
    private $lastPlay;
    private $horseLevel;
    private $alignment;
    private $empire;
    private $guild;


    function __construct(array $data){

        foreach($data as $key => $value){
            $this->setData($key, $value);
        }

    }


    // getter
    public function getId(){
        return $this->id;
    }
    public function getAccountId(){
        return $this->accountId;
    }
    public function getName(){
        return $this->name;
    }
    public function getJob(){
        return $this->job;
    }
    public function getPlayTime(){
        return $this->playTime;
    }
    public function getLevel(){
        return $this->level;
    }
    public function getGold(){
        return $this->gold;
    }
    public function getIp(){
        return $this->ip;
    }
    public function getLastPlay(){
        return $this->lastPlay;
    }
    public function getHorseLevel(){
        return $this->horseLevel;
    }
    public function getAlignment(){
        return $this->alignment;
    }
    public function getEmpire(){
        return $this->empire;
    }
    public function getGuild(){
        return $this->guild;
    }


    // setter
    public function setId(int $id){
        $this->id = $id;
    }
    public function setAccountId(int $accountId){
        $this->accountId = $accountId;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setJob(int $job){
        $this->job = $job;
    }
    public function setPlayTime($playTime){
        $this->playTime = $playTime;
    }
    public function setLevel(int $level){
        $this->level = $level;
    }
    public function setGold(int $gold){
        $this->gold = $gold;
    }
    public function setIp($ip){
        $this->ip = $ip;
    }
    public function setLastPlay($lastPlay){
        $this->lastPlay = $lastPlay;
    }
    public function setHorseLevel(int $horseLevel){
        $this->horseLevel = $horseLevel;
    }
    public function setAlignment(int $alignment){
        $this->alignment = $alignment;
    }
    public function setEmpire($empire){
        $this->empire = $empire;
    }
    public function setGuild($guild){
        $this->guild = $guild;
    }


    // establece los datos de uno en uno
    private function setData($key, $value){
        switch($key){
            case 'id':
                $this->setId($value);
                break;
            case 'account_id':
            case 'accountId':
                $this->setAccountId($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'job':
                $this->setJob($value);
                break;
            case 'play_time':
            case 'playTime':
                $this->setPlayTime($value);
                break;
            case 'level':
                $this->setLevel($value);
                break;
            case 'gold':
                $this->setGold($value);
                break;
            case 'ip':
                $this->setIp($value);
                break;
            case 'last_play':
            case 'lastPlay':
                $this->setLastPlay($value);
                break;
            case 'horse_level':
            case 'horseLevel':
                $this->setHorseLevel($value);
                break;
            case 'alignment':
                $this->setAlignment($value);
                break;
            case 'empire':
                $this->setEmpire($value);
                break;
            case 'guild':
                $this->setGuild($value);
                break;
        }
    }


}