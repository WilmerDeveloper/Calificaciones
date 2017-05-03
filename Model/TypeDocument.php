<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TypeDocument extends AppModel {

    var $name = "TypeDocument";
    var $useTable = "TIPOSDOCUMENTO";
    var $primaryKey = 'IDTIPODEDOCUMENTO';
    var $hasMany = array('Documents');
            
    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>
