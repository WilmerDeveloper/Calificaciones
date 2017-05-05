<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DocumentEducation extends AppModel {

    var $name = "DocumentEducation";
    var $useTable = "EDUCACIONASPIRANTE";
    var $primaryKey = 'IDEDUCACIONASPIRANTE';
    var $belongsTo = array(
        'Candidate' => array("foreignKey" => "NRODOCUMENTO"),
        'LevelEducation' => array("foreignKey" => "IDNIVELEDUCACION"),
    );
    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>
