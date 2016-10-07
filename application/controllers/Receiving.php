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
        $this->data['pagebody'] = 'receiving/index';
        
        $this->load->model('supplies');
        $ingredients = $this->supplies->all();
        ////IGNORING 
        $supplyList = array();
        foreach($ingredients as $ingredient){
            $supplyList[] = array('name'=> $ingredient['name'],'quantity'=> $ingredient['perBox'], 'price'=> $ingredient['price']);
        }
        ////END 
        $this->data['supplies'] = $ingredients;
        
        $this->render();
    }
    
    public function order(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'welcome_message';
        
        $this->render();
    }

    public function details($id) {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/details';
        
        $this->load->model('supplies');
        $ingredient = $this->supplies->getByKey('id', $id);
        // TODO: Should probably put each value separately. 
        $this->data['ingredient'] = $ingredient;

        $this->render();
    }
    public function receipt()
    {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/receipt';
        
        $this->render();
    }
    
}
