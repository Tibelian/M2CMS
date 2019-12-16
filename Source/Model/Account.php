<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class Account{

    private $id;
    private $login;
    private $password;
    private $realName;
    private $socialId;
    private $email;
    private $createTime;
    private $status;
    private $lastPlay;
    private $coins;
    private $webAdmin;
    private $webIp;
    private $referral;
    private $lostToken;
    private $empire;


    function __construct(array $data){

        foreach($data as $key => $value){
            $this->setData($key, $value);
        }

    }


    // getter
    public function getId(){
        return $this->id;
    }
    public function getLogin(){
        return $this->id;
    }
    public function getPassword(){
        return $this->id;
    }
    public function getRealName(){
        return $this->id;
    }
    public function getSocialId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->id;
    }
    public function getCreateTime(){
        return $this->id;
    }
    public function getStatus(){
        return $this->id;
    }
    public function getLastPlay(){
        return $this->id;
    }
    public function getCoins(){
        return $this->id;
    }
    public function getWebAdmin(){
        return $this->id;
    }
    public function getWebIp(){
        return $this->id;
    }
    public function getReferral(){
        return $this->id;
    }
    public function getLostToken(){
        return $this->id;
    }
    public function getEmpire(){
        return $this->empire;
    }

    
    // setter
    public function setId(int $id){
        $this->id = $id;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRealName($realName){
        $this->realName = $realName;
    }
    public function setSocialId($socialId){
        $this->socialId = $socialId;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setCreateTime($createTime){
        $this->createTime = $createTime;
    }
    public function setStatus($status){
        if($status == 'BLOCKED' || $status == 'OK' || $status == 'PENDING'){
            $this->status = $status;
        }
    }
    public function setLastPlay($lastPlay){
        $this->lastPlay = $lastPlay;
    }
    public function setCoins(int $coins){
        $this->coins = $coins;
    }
    public function setWebAdmin(int $webAdmin){
        $this->webAdmin = $webAdmin;
    }
    public function setWebIp($webIp){
        $this->webIp = $webIp;
    }
    public function setReferral($referral){
        $this->referral = $referral;
    }
    public function setLostToken($lostToken){
        $this->lostToken = $lostToken;
    }
    public function setEmpire($empire){
        $this->empire = $empire;
    }


    // establece los datos de uno en uno
    private function setData($key, $value){
        switch($key){
            case 'id':
                $this->setId($value);
                break;
            case 'login':
                $this->setLogin($value);
                break;
            case 'password':
                $this->setPassword($value);
                break;
            case 'real_name':
            case 'realName':
                $this->setRealName($value);
                break;
            case 'social_id':
            case 'socialId':
                $this->setSocialId($value);
                break;
            case 'email':
                $this->setEmail($value);
                break;
            case 'create_time':
            case 'createTime':
                $this->setCreateTime($value);
                break;
            case 'status':
                $this->setStatus($value);
                break;
            case 'last_play':
            case 'lastPlay':
                $this->setLastPlay($value);
                break;
            case 'coins':
                $this->setCoins($value);
                break;
            case 'web_admin':
            case 'webAdmin':
                $this->setWebAdmin($value);
                break;
            case 'web_ip':
            case 'webIp':
                $this->setWebIp($value);
                break;
            case 'referral':
                $this->setReferral($value);
                break;
            case 'lost_token':
            case 'lostToken':
                $this->setLostToken($value);
                break;
            case 'empire':
                $this->setEmpire($value);
                break;
        }
    }

}