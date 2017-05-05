<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Candidate extends AppModel {

    var $name = "Candidate";
    var $useTable = "ASPIRANTE";
    var $primaryKey = 'NRODOCUMENTO';
    var $hasMany = array('Document', 'DocumentEducation', 'DocumentExperience');

    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>
