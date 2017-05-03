<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DocumentExperience extends AppModel {

    var $name = "DocumentExperience";
    var $useTable = "EXPERIENCIALABORAL";
    var $primaryKey = 'IDEXPERIENCIALABORAL';
    var $belongsTo = array(
        'Candidate' => array("foreignKey" => "NRODOCUMENTO"),
    );
    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>
