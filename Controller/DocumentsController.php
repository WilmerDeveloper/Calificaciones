<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DocumentsController extends AppController {

    var $name = 'Documents';

    public function edit($id) {

        if (empty($this->data)) {
            $this->Document->recursive = 1;
            $this->data = $this->Document->find("first", array("conditions" => array("Document.IDDOCUMENTOASPIRANTE" => $id)));
        } 
        else {
            if ($this->Document->save($this->data)) {
                $this->Session->setFlash('Documento calificado con éxito', 'flash');
                $criterio = $this->data['Candidate']['NRODOCUMENTO'];
                $this->redirect(array('controller' => 'Candidates', 'action' => 'report', $criterio));
                // $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash("Error guardando datos", 'flash');
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
            }
        }
    }

}
