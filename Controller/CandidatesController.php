<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CandidatesController extends AppController {

    var $name = 'Candidates';

        
    public function report($nro_documento = null) {
        
       $nro_documento = isset($this->data['Candidate']['criterio']) ? $this->data['Candidate']['criterio']: $nro_documento;
        
        $this->Candidate->recursive = -1;
        $candidates = $this->Candidate->find("first", array("conditions" => array("Candidate.NRODOCUMENTO" => $nro_documento)));
        $documentEducations = $this->Candidate->DocumentEducation->find("all", array("recursive" => 0, "conditions" => array("DocumentEducation.NRODOCUMENTO" => $nro_documento)));
        $documentExperiences = $this->Candidate->DocumentExperience->find("all", array("recursive" => -1, "conditions" => array("DocumentExperience.NRODOCUMENTO" => $nro_documento)));
        $documents = $this->Candidate->Document->find("all", array("recursive" => 0, "conditions" => array("Document.NRODOCUMENTO" => $nro_documento)));
        $this->set('candidate', $candidates);
        $this->set('documentEducations', $documentEducations);
        $this->set('documentExperiences', $documentExperiences);
        $this->set('documents', $documents);
    }
    
    public function edit($nro_documento) {
        if (empty($this->data)) {

            $this->Candidate->recursive = -1;
            $this->data = $this->Candidate->find("first", array("conditions" => array("Candidate.NRODOCUMENTO" => $nro_documento)));
        } else {
            if ($this->Candidate->save($this->data)) {
                $this->Session->setFlash('Aspirante calidicado con éxito', 'flash');
                $criterio = $this->data['Candidate']['NRODOCUMENTO'];
                $this->redirect(array('controller' => 'Candidates', 'action' => 'report', $criterio));
//                $this->redirect(array('action' => 'report'));
            } else {
                $this->Session->setFlash("Error guardando datos", 'flash');
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
            }
        }
        
    }
    
    public function search(){
    
    }

}

