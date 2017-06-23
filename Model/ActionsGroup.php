<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author 250-1-405
 */
class ActionsGroup extends AppModel{

    //put your code here
    public $name = "ActionsGroup";
    public $belongsTo = array('Action','Group');

   

    
}
?>
