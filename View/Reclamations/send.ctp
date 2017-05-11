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
<fieldset>
    <?php echo $this->Form->create("Reclamation", array("class" => "form", "id" => "formulario", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "send"))); ?>
    <?php echo $this->Form->hidden('Reclamation.hash_documento', array('value' => $hash_documento)); ?>
    <?php echo $this->Form->hidden('Reclamation.NRODOCUMENTO', array('value' => $candidate[0][0]['NRODOCUMENTO'])); ?>
    <?php echo "Cédula ". $candidate[0][0]['NRODOCUMENTO']; ?>   
    <?php echo "Nombre ". $candidate[0][0]['NOMBRECOMPLETO']; ?>   

    <?php echo $this->Form->input('Reclamation.justificacion', array('label' => 'Justificación', 'class' => 'form-control', 'type' => 'text')); ?>   
    <br>
    <?php
    echo $this->Form->file('Reclamation.archivo', array('label' => 'Adjuntar soporte',
        'class' => 'form-control',
        'accept' => 'application/pdf',
        'aria-required' => 'true',
        'required' => 'true',
        'extension' => 'pdf'));
    ?>
    <br><br>
    <?php echo "FECHA " .date("Y-m-d"); ?>

    <?php echo $this->Form->end(array('label' => "Enviar", 'class' => 'btn btn-default')) ?>
</fieldset>