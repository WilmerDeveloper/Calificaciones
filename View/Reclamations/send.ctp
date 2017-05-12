<?php
echo $this->Html->css('modal.css');
?>
<script>
    $(document).ready(function () {
        $("#formulario").validate({
            rules: {
                'data[Reclamation][justificacion]': {
                    required: true
                }
            }
        });
    });
</script>
<section class="section-app">
        <h4>Reclamación en contra del resultado de la verificación de requisitos mínimos</h4>
    <center>
        <?php echo $this->Html->image('color.jpg', array('border' => "0", 'align' => 'center', 'width'=>'300')); ?>
    </center>
    <div class="dataTable_wrapper">
        <div class="edit-form">
            <table border="0" class="table table-hover">
                <tbody>
                    <tr>
                        <td><strong>Aspirante</strong></td>
                        <td><?php echo $candidate[0][0]['NOMBRECOMPLETO']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Cédula</strong> </td>
                        <td><?php echo $candidate[0][0]['NRODOCUMENTO'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Fecha</strong> </td>
                        <td><?php echo "FECHA " .date("Y-m-d"); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->Form->create("Reclamation", array("class" => "form", "id" => "formulario", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "send"))); ?>
    <?php echo $this->Form->hidden('Reclamation.hash_documento', array('value' => $hash_documento)); ?>
    <?php echo $this->Form->hidden('Reclamation.NRODOCUMENTO', array('value' => $candidate[0][0]['NRODOCUMENTO'])); ?>
    <?php echo $this->Form->input('Reclamation.justificacion', array('label' => '', 'class' => 'form-control', 'type' => 'textarea', 'placeholder' => 'Justificación (max 2000 caracteres)')); ?>   
    <br>
    <?php
    echo $this->Form->file('Reclamation.archivo', array('label' => 'Adjuntar soporte',
        'class' => 'form-control',
        'accept' => 'application/pdf',
        'extension' => 'pdf'));
    ?>
    <br>
    <p><strong>Señor aspirante</strong>, recuerde que si es de su elección, puede cargar su reclamación en un archivo en formato PDF, cualquier otro tipo de archivo no se podrá abrir en el momento de la verificación; o puede escribir el texto de reclamación en el recuadro, siempre que no exceda de los 2000 caracteres. De igual manera, se informa que solo puede cargar una (1) vez su reclamación, por lo tanto, antes de dar click en enviar, asegúrese de cargar su reclamación en la forma correcta</p>
    <br>
    <?php echo $this->Form->end(array('label' => "Enviar", 'class' => 'btn btn-success')) ?>
</section>