  

<div id="content" align="center">
                <section class="border-loging">
<?php
echo $this->Html->css('modal.css');

?>
                    <br/>
                     <?php
                            echo $this->Ajax->link("Busqueda por aspirante", array('controller' => "Candidates", "action" => "search"), 
                                            array(  
                                            'update' => 'loadedit',
                                            'complete' => '$("#edit1").modal("show")',
                                            'class' => 'btn btn-info btn-lg',
                                            'type' => 'synchronous'
                                            )
                                        );
                        ?>  
                    
                
                    <br/>
                    <br/>
                        <?php
                            echo $this->Ajax->link("Busqueda por grupo", array('controller' => "Candidates", "action" => "search"), 
                                            array(  
                                            'update' => 'loadedit',
                                            'complete' => '$("#edit1").modal("show")',
                                            'class' => 'btn btn-info btn-lg',
                                            'type' => 'synchronous'
                                            )
                                        );
                        ?>
                    <br/>
                    <br/>

                    <div id="banner" align="center"><?php echo $this->Html->image('login.png', array('width'=>'300','height'=>'auto')) ?> </div>


                </section>

            </div>
     
<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width: 30%">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div id="banner"><h3>Criterio de busqueda</h3></div>
            </div>


                <!-- -->

                    <div class="modal-body" id="loadedit">

                    </div>

                <!-- -->


        </div>
    </div>
</div>