<?php

class Geographic extends AppModel {

    public $name = "Geographic";
    var $useTable = "GEOGRAFIA";
    var $primaryKey = 'ID';
    public $hasMany = array('Candidate');
    public $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>