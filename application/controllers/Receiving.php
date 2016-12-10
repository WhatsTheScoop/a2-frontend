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
        
        $this->load->model('ingredients');
        $ingredients = $this->ingredients->all();

        $supplyList = array();
        foreach($ingredients as $ingredient){
            $supplyList[] = array(
                'id' => $ingredient['id'],
                'name' => $ingredient['name'],
                'perBox' => $ingredient['perBox'], 
                'onHand' => $ingredient['onHand'],
                'price' => "$".number_format($ingredient['price'], 2));
        }

        $this->data['supplies'] = $supplyList;        
        $this->render();
    }
    
    public function order() {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'welcome_message';
        
        $this->render();
    }

    public function show($id = 0) {
        $this->load->model('ingredients');
        $ingredient = $this->ingredients->get($id);
        
        if (is_null($ingredient))
            show_404();

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/show';

        $this->data['id'] = $ingredient['id']; 
        $this->data['name'] = $ingredient['name']; 
        $this->data['price'] = "$".number_format($ingredient['price'], 2); 
        $this->data['type'] = $ingredient['type']; 
        $this->data['perBox'] = $ingredient['perBox']; 
        $this->data['onHand'] = $ingredient['onHand'];
        $this->data['backUrl'] = base_url() . "receiving";
        
        $this->render();
    }
    public function receipt()
    {
        $this->load->model('ingredients');

        $totalOrderCost = 0;
        $message = "";

        // ... (NULL, TRUE) returns all POST items with XSS filter
        foreach ($this->input->post(NULL, TRUE) as $id => $quantity) {

            if ($quantity == 0)
                continue;

            $ingredient = $this->ingredients->get($id);
            $this->ingredients->orderMore($id, $quantity);

            $supplyName = $ingredient['name'];
            $cost = $quantity * $ingredient['price'];
            $totalOrderCost = $totalOrderCost + $cost;

            $formattedCost = moneyFormat($cost);
            $message = $message . "Ordered and received $quantity boxes of $supplyName(s) for $formattedCost <br>";
        }

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'receiving/receipt';
        $this->data['content'] = $message;
        $this->data['totalCost'] = moneyFormat($totalOrderCost);
        $this->data['backUrl'] = base_url() . "receiving";

        $this->render();
    }
    
}
