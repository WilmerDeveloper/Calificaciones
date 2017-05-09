<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ConvocationCharge extends AppModel {

    var $name = "ConvocationCharge";
    var $useTable = "CARGOSCONVOCATORIA";
    var $primaryKey = 'IDCARGOCONVOCATORIA';
    var $hasMany = array('Inscription');
    var $belongsTo = array(
        'Convocation' => array("foreignKey" => "IDCONVOCATORIA"),
        'Dependence' => array("foreignKey" => "IDDEPENDENCIA"),
        'Charge' => array("foreignKey" => "IDCARGO"),
    );
    var $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}


