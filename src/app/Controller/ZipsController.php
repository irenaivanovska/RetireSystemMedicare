<?php
    class ZipsController extends AppController {
        var $name = 'Zips';
        var $uses = array();
        function index() {
            if (!empty($this->data)) {
                $this->redirect(array('controller'=>'zips',
                    'action'=>'welcome', urlencode($this->data['name'])));
            }
        }
        function welcome( $name = null ) {
            if(empty($name)) {
                $this->Session->setFlash('Please provide your name!', true);
                $this->redirect(array('controller'=>'zips', 'action'=>'index'));
            }
            $this->set('name', urldecode($name));
        }
    }
?>