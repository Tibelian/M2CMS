<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class Guild{

    private $id;
    private $name;
    private $sp;
    private $master;
    private $level;
    private $exp;
    private $skillPoint;
    private $win;
    private $draw;
    private $loss;
    private $ladderPoint;
    private $gold;


    function __construct(array $data){

        foreach($data as $key => $value){
            $this->setData($key, $value);
        }

    }


    // getter
    public function getId(){
        return $this->$id;
    }
    public function getName(){
        return $this->$name;
    }
    public function getSp(){
        return $this->$sp;
    }
    public function getMaster(){
        return $this->$master;
    }
    public function getLevel(){
        return $this->$level;
    }
    public function getExp(){
        return $this->$exp;
    }
    public function getSkillPoint(){
        return $this->$skillPoint;
    }
    public function getWin(){
        return $this->$win;
    }
    public function getDraw(){
        return $this->$draw;
    }
    public function getLoss(){
        return $this->$loss;
    }
    public function getLadderPoint(){
        return $this->$ladderPoint;
    }
    public function getGold(){
        return $this->$gold;
    }


    // setter
    public function setId(int $id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setSp(int $sp){
        $this->sp = $sp;
    }
    public function setMaster(int $master){
        $this->master = $master;
    }
    public function setLevel(int $level){
        $this->level = $level;
    }
    public function setExp(int $exp){
        $this->exp = $exp;
    }
    public function setSkillPoint(int $exp){
        $this->exp = $exp;
    }
    public function setWin(int $win){
        $this->win = $win;
    }
    public function setDraw(int $draw){
        $this->draw = $draw;
    }
    public function setLoss(int $loss){
        $this->loss = $loss;
    }
    public function setLadderPoint(int $ladderPoint){
        $this->ladderPoint = $ladderPoint;
    }
    public function setGold(int $gold){
        $this->gold = $gold;
    }


    // establece los datos de uno en uno
    private function setData($key, $value){
        switch($key){
            case 'id':
                $this->setId($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'sp':
                $this->setSp($value);
                break;
            case 'master':
                $this->setMaster($value);
                break;
            case 'level':
                $this->setLevel($value);
                break;
            case 'exp':
                $this->setExp($value);
                break;
            case 'skillPoint':
            case 'skill_point':
                $this->setSkillPoint($value);
                break;
            case 'win':
                $this->setWin($value);
                break;
            case 'draw':
                $this->setDraw($value);
                break;
            case 'loss':
                $this->setLoss($value);
                break;
            case 'ladder_point':
            case 'ladderPoint':
                $this->setLadderPoint($value);
                break;
            case 'gold':
                $this->setGold($value);
                break;
        }
    }


}