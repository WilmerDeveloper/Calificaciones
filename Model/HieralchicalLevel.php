<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HieralchicalLevel extends AppModel {

    public $name = "HieralchicalLevel";
    var $useTable = "NIVELJERARQUICO";
    var $primaryKey = 'IDNIVELJERARQUICO';
    var $hasMany = array('Charges');
    public $actsAs = array(
        'Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}