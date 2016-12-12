<?php

class Errors extends Application {
    
    public function index() {
        $this->data['pagebody'] = 'errors/custom';
        $this->data['error_title'] = "Error";
        $this->data['error_message'] = "Looks like something went wrong, sorry!";
        $this->data['error_return_url'] = base_url();
        $this->render();
    }

    public function noaccess() {
        $this->data['pagebody'] = 'errors/custom';
        $this->data['error_title'] = "Not allowed";
        $this->data['error_message'] = "You are not authorized to access this page.";
        $this->data['error_return_url'] = base_url();
        $this->render();        
    }
}
