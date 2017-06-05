<?php

class AppController extends Controller {

    var $name = "App";
    public $components = array(
        'Session' => array(
            'timeout' => 1
        ),
        'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authorize' => array('Controller') // Added this line
        ),
        'RequestHandler'
    );
    public $helpers = array('Html', 'Form', 'Javascript', "Ajax", 'Session', 'Js');

    public function isAuthorized($user) {

        App::Import('model', 'ActionsGroup');
        $a = new ActionsGroup();
        $a->recursive = 2;

        App::Import('model', 'Entity');
        $controlador = new Entity();

        $entity_id = $controlador->field('id', array('Entity.name' => $this->name));

//        echo 'controlador ', $this->name, '<br>';
//        echo 'action ', $this->action, '<br>';
//        echo 'entity_id ', $entity_id, '<br>';
//        echo 'group_id ', $user['group_id'], '<br>';


        $permitido = $a->find('count', array('conditions' => array('Action.name' => $this->action, 'Action.entity_id' => $entity_id, 'ActionsGroup.group_id' => $user['group_id'])));

        if ($permitido > 0) {
            return true;
        } else {
            $this->redirect(array('controller' => 'pages', 'action' => 'denied'));
            return false;
        }
    }

    function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow(array('login', 'send', 'logout', 'end'));

        $modelosAutorizados = array("Reclamations", "Complains");

        if ($this->name != "Users" and ! in_array($this->name, $modelosAutorizados)) {
            if (!AuthComponent::user('id')) {
                $this->redirect(array('controller' => 'Users', 'action' => 'login'));
            }
        }

        if (!$this->RequestHandler->isAjax()) {
            //Se realiza cuando la petición no es ajax. Cuando carga toda la página.
            $this->Session->write('Auth.redirect', null);
        }
    }

}

?>