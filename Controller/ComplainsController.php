<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ComplainsController extends AppController {

    var $name = 'Complains';

    public function send($hash_documento = null) {

        $this->layout = "reclamation";

        if (empty($this->data)) {
            $candidate = $this->Complain->query('EXEC dbo.candidateByNroDocumento "' . $hash_documento . '";');
            $this->set('candidate', $candidate);
            $this->set('hash_documento', $hash_documento);
        } else {
            $file_error = false;
            $rutaArchivo = APP . "webroot" . DS . "files" . DS . "ReclamacionFase2" . DS . $this->data['Complain']['NRODOCUMENTO'];
            if (!is_dir($rutaArchivo)) {
                if (!mkdir($rutaArchivo)) {
                    $file_error = true;
                }
            }
            if (isset($this->data['Complain']["error"])) {
                if ($this->data['Complain']["error"]==1) {
                    $file_error = true;
                }
            }
            if (!$file_error) {
                $reemplazar = array('<', '>', '"', '–', "'", '+', '/', '*');

                $justificacion = trim($this->data['Complain']['justificacion']);
                $justificacion = str_replace($reemplazar, "", $justificacion);
                
                $hash = trim($this->data['Complain']['hash_documento']);
                $hash = str_replace($reemplazar, "", $hash);

                $parameters[] = "'" . $hash . "'";
                $parameters[] = "'" . $justificacion . "'";

                $parametros_string = $separado_por_comas = implode(",", $parameters);

                //si se obtiene como respuesta 0 significa que ya existia una reclamacion por esa cédula y no se crea el archivo                
                $complain_id = $this->Complain->query('EXEC dbo.newComplain ' . $parametros_string . ';');

                if ($complain_id[0][0]['id'] == 0) {
                    $this->redirect(array('action' => 'end', 1));
                }

                if (!empty($this->data['Complain']['archivo']['tmp_name'])) {
                    $nombrearchivo = "ReclamacionFase2" . $complain_id[0][0]['id'] . ".pdf";
                    if (move_uploaded_file($this->data['Complain']['archivo']['tmp_name'], $rutaArchivo . DS . $nombrearchivo)) {
                        $this->redirect(array('action' => 'end', 2));
                    } else {
                        $this->redirect(array('action' => 'end', 3));
                    }
                } else {
                    $this->redirect(array('action' => 'end', 2));
                }
            } else {
                $this->redirect(array('action' => 'end', 3));
            }
        }
    }

    public function end($mensaje) {
        $this->layout = "reclamation";
        switch ($mensaje) {
            case 1:
                $imagen = "existe.png";
                break;
            case 2:
                $imagen = "procesado.png";
                break;
            case 3:
                $imagen = "error.png";
                break;
            default:
                $imagen = "error.png";
                break;
        }

        $this->set('imagen', $imagen);
    }

}
