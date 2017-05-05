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
                            echo $this->Form->create("Candidates", array('novalidate' => '', 'id' => 'formulario', 'role' => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "report")));
                        ?>
                                <div class="input-group custom-search-form">
                                    <?php 
                                    echo $this->Form->input("Candidate.criterio", array('label' => '', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Cédula'));
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