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
    //put your code here

    public function index(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving';
        
        $this->load->model('supplies');
        $ingredients = $this->supplies->all();
        $supplyList = array();
        foreach($ingredients as $ingredient){
            $supplyList[] = array('name'=> $ingredient['name'],'quantity'=> $ingredient['quantity'], 'price'=> $ingredient['price']);
        }
        $this->data['supplies'] = $supplyList;
        
        $this->render();
    }
    
    public function order(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'welcome_message';
        
        $this->render();
    }
    
}
