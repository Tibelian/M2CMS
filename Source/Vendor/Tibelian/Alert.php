<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */
class Alert {
    
    private $type;
    private $message;
    private $dismiss;
    
    public function __construct($type, $message, $dismiss = true) {
        $this->setType($type);
        $this->setMessage($message);
        $this->setDismiss($dismiss);
    }
    
    public function getType() {
        return $this->type;
    }
    public function getMessage() {
        return $this->message;
    }
    public function getDismiss() {
        return $this->dismiss;
    }
    public function setType($type) {
        $this->type = $type;
    }
    public function setMessage($message) {
        $this->message = $message;
    }
    public function setDismiss(bool $dismiss) {
        $this->dismiss = $dismiss;
    }
    public function __toString() {
        return __CLASS__ . ' - Type: ' . $this->getType() . ' - Message: ' . $this->getMessage() . ' - Dimsmiss: ' . $this->getDismiss();
    }
    
    public function fetchAssoc(){
        return array(
            'type' => $this->getType(),
            'message' => $this->getMessage(),
            'dismiss' => $this->getDismiss(),
        );
    }
    
}