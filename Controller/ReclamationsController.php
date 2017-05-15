<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ReclamationsController extends AppController {

    var $name = 'Reclamations';

    public function send($hash_documento = null) {

        $this->layout = "reclamation";

        if (empty($this->data)) {
            $candidate = $this->Reclamation->query('EXEC CONVOCATORIA_INSCRIPCION.dbo.candidateByNroDocumento "' . $hash_documento . '";');
            $this->set('candidate', $candidate);
            $this->set('hash_documento', $hash_documento);
        } else {
            $file_error = false;
            $rutaArchivo = APP . "webroot" . DS . "files" . DS . "Reclamaciones" . DS . $this->data['Reclamation']['NRODOCUMENTO'];
            if (!is_dir($rutaArchivo)) {
                if (!mkdir($rutaArchivo)) {
                    $file_error = true;
                }
            }
            if ($this->data['Reclamation']["error"] == 1) {
                $file_error = true;
            }
            if (!$file_error) {
                $parameters[] = '"' . $this->data['Reclamation']['hash_documento'] . '"';
                $parameters[] = '"' . $this->data['Reclamation']['justificacion'] . '"';
                $parametros_string = $separado_por_comas = implode(",", $parameters);

                //si se obtiene como respuesta 0 significa que ya existia una reclamacion por esa cédula y no se crea el archivo
                $reclamacion_id = $this->Reclamation->query('EXEC CONVOCATORIA_INSCRIPCION.dbo.newReclamation ' . $parametros_string . ';');

                if ($reclamacion_id[0][0]['id'] == 0) {
                    $this->redirect(array('action' => 'end', "Ya existe una reclamación para esta cédula"));
                }

                if (!empty($this->data['Reclamation']['archivo']['tmp_name'])) {
                    $nombrearchivo = "Reclamacion-" . $reclamacion_id[0][0]['id'] . ".pdf";
                    if (move_uploaded_file($this->data['Reclamation']['archivo']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->redirect(array('action' => 'end', "Archivo guardado exitosamente"));
                    } else {
                        $this->redirect(array('action' => 'end', "Error adjuntando archivo"));
                    }
                } else {
                    $this->redirect(array('action' => 'end', "Registro guardado exitosamente sin archivo"));
                }
            } else {
                $this->redirect(array('action' => 'end', "Error adjuntando archivo"));
            }
        }
    }

    public function end($mensaje) {
        $this->layout = "reclamation";
        $this->set('mensaje', $mensaje);
    }

}
