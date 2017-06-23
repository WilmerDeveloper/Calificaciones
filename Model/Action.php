<?php

class Action extends AppModel {

    public $name = "Action";
    public $belongsTo = array('Entity');
    public $hasAndBelongsToMany = array('Group');


}

?>