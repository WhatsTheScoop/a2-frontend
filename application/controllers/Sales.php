<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/** TODO: description
 * Stock - the assembled goods or services ready to sell. Again with sample values ... a recipe
 * code (Legendary Burger), a description (single patty, original burger), a selling price ($5.49),
 * quantity on hand if pre-made.
 *
 * @author Jason Cheung
 */
class Sales extends Application {
    //put your code here

    public function index(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/index';
        
        // Load the data 
        $this->load->model('product');
        $this->load->model('salesLog');
        //$this->salesLog->add('test');
        $products = $this->product->all();

        // Format the data 
        $productList = array();
        foreach($products as $p){
            $productList[] = array(
                'id'          => $p['id'],
                'name'        => $this->product->getRecipe($p)['code'],
                'description' => $this->product->getRecipe($p)['description'],                
                'price'       => $p['price'],
                'quantity'    => $p['quantity'],
                'promotion'   => $p['promotion'] ? "Yes" : "No",    // TODO: Not sure if the presenting logic should be here.                
            );
        }

        $this->data['products'] = $productList;
        $this->render();
    }
    
    public function details($id) {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/details';
        
        $this->load->model('product');
        $product = $this->product->get($id);
        $recipe  = $this->product->getRecipe($product);

        $this->data['id']       = $product['id'];
        $this->data['recipeId'] = $product['recipeId'];
        $this->data['name']     = $recipe['code'];
        $this->data['description'] = $recipe['description'];
        $this->data['price']    = $product['price'];
        $this->data['quantity'] = $product['quantity'];
        $this->data['promotion'] = $product['promotion'] ? "Yes" : "No";    // TODO: Same as above

        $this->render();
    }
    public function order()
    {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/order';
        
        $this->render();
    }
    
}
