<?php
echo $this->Html->css('modal.css');
?>
<section>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4> Calificación </h4>
            </div>
            <br/>
            <div class="dataTable_wrapper">
                <div class="edit-form">
                    <table border="0" class="table table-hover">
                            <tbody>
                            <tr>
                                <td><strong>Aspirante</strong></td>
                                <td><?php echo $this->data['Candidate']['PRIMERNOMBRE'], " ", $this->data['Candidate']['PRIMERAPELLIDO']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cédula </strong></td>
                                <td><?php echo $this->data['Candidate']['NRODOCUMENTO']?></td>
                            </tr>
                            <tr>
                                <td><strong>Visualizar documento</strong></td>
                                <td>
                                    <a href="http://192.168.1.96:85/ASPIRANTE/DescargarArchivo?URLArchivo=E:\DOCUMENTOS_ASPIRANTES\<?php echo $this->data['Candidate']['NRODOCUMENTO'];?>\<?php echo $this->data['DocumentExperience']['DOCUMENTO'];?>">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <div class="edit-form">
                <?php
                echo $this->Form->create('DocumentExperience', array('novalidate' => '', 'id' => 'formulario', 'role' => "form", "class" => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "edit", $this->data['DocumentExperience']['IDEXPERIENCIALABORAL'])));
                echo $this->Form->hidden("Candidate.NRODOCUMENTO", array('value' => $this->data['Candidate']['NRODOCUMENTO']));
                echo $this->Form->hidden("DocumentExperience.IDEXPERIENCIALABORAL", array('value' => $this->data['DocumentExperience']['IDEXPERIENCIALABORAL']));
                echo $this->Form->input("DocumentExperience.NIVELCUMPLIMIENTO", array('label' => '', 'class' => 'form-control', 'required' => '', 'empty' => 'Calificación', 'options' => array('Cumple' => 'Cumple', 'No cumple' => 'No cumple')));
                echo $this->Form->input("DocumentExperience.JUSTIFICACION", array('placeholder' => 'Justificación', 'required' => '', 'class' => 'form-control', 'label'=>''));
                echo '<br/>';
                echo $this->Form->end(array('label' => "Guardar", 'class' => 'btn btn-success'));
                ?>
                </div>
                <br/>
            </div>
        </div>
    </div>
</div>
</section>