<?php
    class ZipFind  extends AppModel {
        public $name = 'ZipFinds';
        public $useTable = 'vwplansbyzipnew_local';


        var $validate = array(
            'zip_code' => array(
                'rule' => array('minLength', 1)
            ),
            'body' => array(
                'rule' => array('minLength', 1)
            )
        );
    }
?>