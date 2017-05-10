<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Convocation extends AppModel {

    public $name = "Convocation";
    var $useTable = "CONVOCATORIA";
    var $primaryKey = 'IDCONVOCATORIA';
    var $hasMany = array('ConvocationCharges');
    public $actsAs = array(
        'Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}