<br/>
<br/>
<section class="border-loging">
<?php
echo $this->Html->css('modal.css');
echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'), 'class' => 'form-loging'));
?>

<h3 class="">Iniciar sesión</h3>

<?php echo $this->Form->input('User.username', array('label' => '', 'type' => "text", 'class' => "form-control", 'placeholder' => "Usuario", 'required' => "", 'autofocus' => "")); ?>
<?php echo $this->Form->input('User.password', array('label' => '', 'type' => "password", 'class' => "form-control", 'placeholder' => "Contraseña", 'required' => "")); ?>

<?php echo $this->Form->end(array('label' => "Iniciar sesión", 'class' => "btn btn-success")) ?>
<div id="banner" align="center"><?php echo $this->Html->image('login.png', array('width'=>'300','height'=>'auto')) ?> </div>


</section>
