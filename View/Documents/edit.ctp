<?php
echo $this->Html->css('modal.css');

?>
<section class="section-app">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> Calificación </h3>
            </div>
            <div class="dataTable_wrapper">
                <div class="edit-form">
                    <table border="0" class="table table-hover">
                            <tbody>
                            <tr>
                                <td><strong>Aspirante</strong></td>
                                <td><?php echo $this->data['Candidate']['PRIMERNOMBRE'], " ", $this->data['Candidate']['PRIMERAPELLIDO']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Cédula</strong> </td>
                                <td><?php echo $this->data['Candidate']['NRODOCUMENTO']?></td>
                            </tr>
                            <tr>
                                <td><strong>Documento a calificar</strong></td>
                                <td><?php echo $this->data['TypeDocument']['DOCUMENTO']; ?></td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <div class="edit-form">
                <?php
                echo $this->Form->create('Document', array('novalidate' => '', 'id' => 'formulario', 'role' => "form", "class" => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "edit", $this->data['Document']['IDDOCUMENTOASPIRANTE'])));
                echo $this->Form->hidden("Document.IDDOCUMENTOASPIRANTE", array('value' => $this->data['Document']['IDDOCUMENTOASPIRANTE']));
                echo $this->Form->input("Document.JUSTIFICACION", array('placeholder' => 'Justificación', 'required' => '', 'class' => 'form-control', 'label'=>''));
                echo $this->Form->input("Document.NIVELCUMPLIMIENTO", array('label' => '', 'class' => 'form-control', 'required' => '', 'empty' => 'Calificación', 'options' => array('Cumple' => 'Cumple', 'No cumple' => 'No cumple')));
                echo '<br/>';
                echo $this->Form->end(array('label' => "Guardar", 'class' => 'btn btn-success', 'align'=>'center'));
                ?>
                </div>
                <br/>
            </div>
        </div>
    </div>
</div>
</section>