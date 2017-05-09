<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('CakeEmail', 'Network/Email');

class ConvocationChargesController extends AppController {

    var $name = 'ConvocationCharges';

    public function index() {
        
    }
    
    public function report() {
        
       $id = $this->data['ConvocationCharge']['criterio'];
        
        $this->ConvocationCharge->recursive = 0;
        $datosCargo = $this->ConvocationCharge->find("first", array("conditions" => array("ConvocationCharge.IDCONVOCATORIA" => $id)));
        $personas = $this->ConvocationCharge->Inscription->find("all", array("recursive" => 0, "conditions" => array("Inscription.IDCARGOCONVOCATORIA" => $id)));
//        $charges = $this->ConvocationCharge->find("first", array("conditions" => array("Charge.IDCARGO" => $this->data['ConvocationCharge']['IDCARGO'])));
//        $dependences = $this->Dependence->find("first", array("recursive" => 0, "conditions" => array("Dependence.IDDEPENDENCIA" => $nro_documento)));
//        $documentExperiences = $this->Candidate->DocumentExperience->find("all", array("recursive" => -1, "conditions" => array("DocumentExperience.NRODOCUMENTO" => $nro_documento)));
//        $documents = $this->Candidate->Document->find("all", array("recursive" => 0, "conditions" => array("Document.NRODOCUMENTO" => $nro_documento)));

        $this->set('datosCargo', $datosCargo);
        $this->set('personas', $personas);
        
//        $this->set('charge', $charges);
//        $this->set('documentExperiences', $documentExperiences);
//        $this->set('documents', $documents);
    }
    
    public function search() {
        
    }
}