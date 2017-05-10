<script>
    $(document).ready(function () {
        $("#formulario").validate({
            rules: {
                'data[ConvocationCharge][criterio]': {
                    range: [1, 111],
                    digits: true,
                    required: true
                }                
            }
        });
    });
</script>

<?php
echo $this->Html->css('modal.css');
?>
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!--<h4> Calificación general del aspirante </h4>-->
                </div>
                <br/>
                <div class="dataTable_wrapper">
                    <div class="search-form">
                        <?php     
                            echo $this->Form->create("ConvocationCharges", array('novalidate' => '', 'id' => 'formulario', 'role' => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "report")));
                        ?>
                        <div class="input-group custom-search-form">
                                    <?php 
                                    echo $this->Form->input("ConvocationCharge.criterio", array('label' => '', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Grupo'));
                                    ?>
                            <span class="input-group-btn">
                                    <?php
                                    echo $this->Form->end(array('label'=>'Buscar', 'class' => 'btn btn-success'));
                                    ?>
                            </span>

                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>