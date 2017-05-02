
    

<div id="content" align="center">
                <section class="border-loging">
<?php
echo $this->Html->css('modal.css');

?>
                    <br/>
                        <?php echo $this->Form->button(
                                'Busqueda por aspirante', 
                                array('type'=>'button', 'class'=>'btn btn-info btn-lg')
                                );
                        ?>
                    <br/>
                    <br/>


                        <?php echo $this->Form->button(
                                'Busqueda por grupo', 
                                array('type'=>'button', 'class'=>'btn btn-info btn-lg')
                                );
                        ?>

                    <br/>
                    <br/>

                    <div id="banner" align="center"><?php echo $this->Html->image('login.png', array('width'=>'300','height'=>'auto')) ?> </div>


                </section>

            </div>
            