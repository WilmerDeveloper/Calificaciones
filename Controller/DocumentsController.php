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
//            $this->data = $this->Document->find("first", array(
//                "fields" => array('TypeDocument.*'),
//                "conditions" => array("Document.IDDOCUMENTOASPIRANTE" => $id),
//                "joins" => array(
//                    array(
//                        'table' => 'TIPOSDOCUMENTO',
//                        'alias' => 'TypeDocument',
//                        'type' => 'left',
//                            'conditions' => array(
//                                'Document.IDTIPODOCUMENTO = TypeDocument.IDTIPODEDOCUMENTO'
//                            )
//                    )
//                )
//            )
//                    );
            $this->data = $this->Document->find("first", array("conditions" => array("Document.IDDOCUMENTOASPIRANTE" => $id)));
        } else {
            if ($this->Document->save($this->data)) {
                $this->Session->setFlash('Documento calificado con éxito', 'flash');
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
                // $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash("Error guardando datos", 'flash');
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
            }
        }
    }

}

?>