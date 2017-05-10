<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DocumentEducationsController extends AppController {

    var $name = 'DocumentEducations';

    public function edit($id) {
        if (empty($this->data)) {

            $this->DocumentEducation->recursive = 1;
            $this->data = $this->DocumentEducation->find("first", array("conditions" => array("DocumentEducation.IDEDUCACIONASPIRANTE" => $id)));
        } else {
            if ($this->DocumentEducation->save($this->data)) {
                $this->Session->setFlash('Documento educativo calificado con éxito', 'flash');
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