<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inscription extends AppModel {

    public $name = "Inscription";
    var $useTable = "INSCRIPCION";
    var $primaryKey = 'IDINSCRIPCION';
    var $belongsTo = array(
        'ConvocationCharge' => array("foreignKey" => "IDCARGOCONVOCATORIA"),
        'Candidate' => array("foreignKey" => "NRODOCUMENTO"),
    );
    public $actsAs = array(
        'Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}