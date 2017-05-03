
<div class="navbar-default sidebar" role="navigation">

    <?php     
        echo $this->Form->create("Proyects", array('novalidate' => '', 'id' => 'formulario', 'role' => "form", 'enctype' => 'multipart/form-data', 'type' => 'file', 'url' => array("action" => "search")));
    ?>
    <div class="input-group custom-search-form">
    <?php 
        echo $this->Form->input("Proyect.parametro", array('label' => '', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Grupo'));
    ?>
        <span class="input-group-btn">
    <?php
        echo $this->Form->end(array('label'=>'Buscar', 'class' => 'btn btn-default'));
    ?>
        </span>

    </div>

    <div>

    </div>   

                                <!-- /input-group -->
                            
</div>
