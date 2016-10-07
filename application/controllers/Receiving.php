<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Receiving
 *
 * @author Francis Quintal
 */
class Receiving extends Application {

    public function index() {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/index';
        
        $this->load->model('supplies');
        $ingredients = $this->supplies->all();

        $supplyList = array();
        foreach($ingredients as $ingredient){
            $supplyList[] = array(
                'id' => $ingredient['id'],
                'name' => $ingredient['name'],
                'perBox' => $ingredient['perBox'], 
                'onHand' => $ingredient['onHand'],
                'price' => $ingredient['price']);
        }

        $this->data['supplies'] = $supplyList;        
        $this->render();
    }
    
    public function order() {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'welcome_message';
        
        $this->render();
    }

    public function details($id = 0) {
        $this->load->model('supplies');
        $ingredient = $this->supplies->get($id);
        
        if (is_null($ingredient))
            show_404();

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/details';

        $this->data['id'] = $ingredient['id']; 
        $this->data['name'] = $ingredient['name']; 
        $this->data['price'] = $ingredient['price']; 
        $this->data['type'] = $ingredient['type']; 
        $this->data['perBox'] = $ingredient['perBox']; 
        $this->data['onHand'] = $ingredient['onHand'];
        $this->data['backUrl'] = base_url() . "receiving";
        
        $this->render();
    }
    
}
