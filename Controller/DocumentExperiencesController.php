<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DocumentExperiencesController extends AppController {

    var $name = 'DocumentExperiences';

    public function edit($id) {
        if (empty($this->data)) {
            $this->DocumentExperience->recursive = 1;
            $this->data = $this->DocumentExperience->find("first", array("conditions" => array("DocumentExperience.IDEXPERIENCIALABORAL" => $id)));
        } else {
            if ($this->DocumentExperience->save($this->data)) {
                $this->Session->setFlash('Documento experiencia calificado con éxito', 'flash');
                $criterio = $this->data['Candidate']['NRODOCUMENTO'];
                $this->redirect(array('controller' => 'Candidates', 'action' => 'report', $criterio));
            } else {
                $this->Session->setFlash("Error guardando datos", 'flash');
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
            }
        }
    }

}

?>