<section>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Calificación
            </div>
            <div class="dataTable_wrapper">
                <div>
                   <table border="0">
                            <tbody>
                            <tr>
                                <td>Aspirante</td>
                                <td><?php echo $this->data['Candidate']['PRIMERNOMBRE'], " ", $this->data['Candidate']['PRIMERAPELLIDO']; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Cédula <?php echo $this->data['Candidate']['NRODOCUMENTO']?></td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <?php
                echo $this->Form->create('DocumentExperience', array('novalidate' => '', 'id' => 'formulario', 'role' => "form", "class" => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "edit", $this->data['DocumentExperience']['IDEXPERIENCIALABORAL'])));
                echo $this->Form->hidden("DocumentExperience.IDEXPERIENCIALABORAL", array('value' => $this->data['DocumentExperience']['IDEXPERIENCIALABORAL']));
                echo $this->Form->input("DocumentExperience.JUSTIFICACION", array('placeholder' => 'Justificación', 'required' => '', 'class' => 'form-control', 'label'=>''));
                echo $this->Form->input("DocumentExperience.NIVELCUMPLIMIENTO", array('label' => '', 'class' => 'form-control', 'required' => '', 'empty' => 'Calificación', 'options' => array('Cumple' => 'Cumple', 'No cumple' => 'No cumple')));
                echo $this->Form->end(array('label' => "Guardar", 'class' => 'btn btn-default'));
                ?>
            </div>
        </div>
    </div>
</div>
</section>