<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class Admin extends Application {

    public function index() {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'admin/index';
        $this->render();
    }

    public function dashboard() {
        $this->data['pagebody'] = 'admin/dashboard';
        $this->render();    
    }

    public function transactions() {
        $this->data['pagebody'] = 'admin/transactions';
        $this->render();    
    }

/*
    public function transaction($id) {
        $this->data['pagebody'] = 'admin/transaction';
        $this->render();    
    }
*/
}

