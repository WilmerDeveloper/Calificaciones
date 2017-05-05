<?php

class LevelEducation extends AppModel {

    public $name = "LevelEducation";
    var $useTable = "NIVELEDUCACION";
    var $primaryKey = 'IDNIVELEDUCACION';
    public $hasMany = array('DocumentEducation');
    public $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>