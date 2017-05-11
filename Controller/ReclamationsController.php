<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ReclamationsController extends AppController {

    var $name = 'Reclamations';

    public function send($hash_documento = null) {
        if (empty($this->data)) {
            $candidate = $this->Reclamation->query('EXEC CONVOCATORIA_INSCRIPCION.dbo.candidateByNroDocumento "' . $hash_documento . '";');
            $this->set('candidate', $candidate);
            $this->set('hash_documento', $hash_documento);
        } else {

            $parameters[] = '"' . $this->data['Reclamation']['hash_documento'] . '"';
            $parameters[] = '"' . $this->data['Reclamation']['justificacion'] . '"';

            $parametros_string = $separado_por_comas = implode(",", $parameters);


            $reclamacion_id = $this->Reclamation->query('EXEC CONVOCATORIA_INSCRIPCION.dbo.newReclamation ' . $parametros_string . ';');

            //var_dump($reclamacion_id); exit;


            $rutaArchivo = APP . "webroot" . DS . "files" . DS . "Reclamaciones" . DS . $this->data['Reclamation']['NRODOCUMENTO'];
            if (!is_dir($rutaArchivo)) {
                if (!mkdir($rutaArchivo)) {
                    echo "error creando archivo";
                    //redirect
                }
            }

            if (!empty($this->data['Reclamation']['archivo']['tmp_name'])) {
                $nombrearchivo = "Reclamacion-" . $reclamacion_id[0][0]['id'] . ".pdf";
                if (move_uploaded_file($this->data['Reclamation']['archivo']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                    $this->Session->setFlash('Archivo cargado exitosamente', 'flash');
                } else {
                    $this->Session->setFlash('Error adjuntando archivo, por favor intentelo nuevamente ', 'flash_error');
                }
            }
        }
    }

}
