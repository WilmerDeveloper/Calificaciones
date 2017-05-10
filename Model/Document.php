<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Document extends AppModel {

    var $name = "Document";
    var $useTable = "DOCUMENTOSASPIRANTE";
    var $primaryKey = 'IDDOCUMENTOASPIRANTE';
    var $belongsTo = array(
        'TypeDocument' => array("foreignKey" => "IDTIPODOCUMENTO"),
        'Candidate' => array("foreignKey" => "NRODOCUMENTO"),
    );
    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}


