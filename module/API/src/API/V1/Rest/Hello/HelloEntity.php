<?php

namespace API\V1\Rest\Hello;

class HelloEntity extends \Core\Model\AbstractModel {

    public $id;
    public $message;

    public function getId() {
        return $this->id;
    }

    public function setId($pId) {
        $this->id = $pId;
    }

    function getMessage() {
        return $this->message;
    }

    function setMessage($message) {
        $this->message = $message;
    }

}
