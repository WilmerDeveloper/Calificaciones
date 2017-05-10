<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Charge extends AppModel {

    public $name = "Charge";
    var $useTable = "CARGO";
    var $primaryKey = 'IDCARGO';
    var $hasMany = array('ConvocationCharges');
    var $belongsTo = array(
        'HierarchicalLevel' => array("foreignKey" => "IDNIVELJERARQUICO"),
    );
    public $actsAs = array(
        'Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}