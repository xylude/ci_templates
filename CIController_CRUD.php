<?php
/* 
    Document   : ${name}
    Created on : ${date}, ${time}
    Author     : Jason Crider
    Description:
        
*/
<#assign namelen = name?length - 1 >
<#assign model = name?capitalize?substring(0,namelen) >
<#assign lowerModel = name?substring(0,namelen) >

class ${name?capitalize} extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    //show
    public function index() {
        $m = new ${model}();
        $this->data['${name}'] = $m->get();
    }

    public function create() {
        $this->view = '${name}/create_or_update';
        $this->data['action'] = 'Create';
        if ($this->get->sent('post')) {
            $this->_create_or_update();
            redirect('${name}');
        }
        $this->data['${lowerModel}'] = new ${model}();
    }

    public function update($id) {
        $this->view = '${name}/create_or_update';
        $this->data['action'] = 'Update';
        if ($this->get->sent('post')) {
            $out = $this->_create_or_update($id);
            redirect('${name}');
        } else {
            $out = new ${model}();
            $out->get_by_id($id);
        }
        $this->data['${lowerModel}'] = $out;
    }

    public function delete($id=false) {
        $m = new ${model}();
        if ($id) {
            $m->get_by_id($id)->delete();
        }
        redirect('${name}');
    }

    private function _create_or_update($id=false) {
        $m = new ${model}();
        if ($id) {
            $m->get_by_id($id);
        }
        //data from form
        foreach($this->get->assoc() as $k=>$v) {
            $m->{$k} = $v;
        }

        
        $m->save();
        return $m;
    }

}