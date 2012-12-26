<?php
/* 
    Document   : ${name}
    Created on : ${date}, ${time}
    Author     : Jason Crider
    Description:
        
*/

class ${name?capitalize} extends MY_Controller {   
    public function __construct() {
        parent::__construct();
    }
    public function index($id=false) {
        switch($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if($id) {
                    $this->_show($id);
                } else {
                    $this->_all();
                }
                break;
            case 'POST':
                $this->_create($id);
                break;
            case 'PUT':
                $this->_update($id);
                break;
            case 'DELETE':
                $this->_delete($id);
                break;
        }
    }
    //private
    private function _create() {
        
    }
    private function _update($id) {
        
    }
    private function _show($id) {
        
    }
    private function _delete($id) {
        
    }
    private function _all() {
    
    }
}