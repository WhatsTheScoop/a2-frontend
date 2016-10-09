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

    public function index() {
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
                'price'       => "$".number_format($p['price'], 2),
                'inStock'    => $p['inStock'],
                'promotion'   => $p['promotion'] ? "Yes" : "No",    // TODO: Not sure if the presenting logic should be here.                
            );
        }

        $this->data['products'] = $productList;
        $this->render();
    }
    
    public function details($id = 0) {
        $this->load->model('product');
        $product = $this->product->get($id);
        $recipe  = $this->product->getRecipe($product);

        if (is_null($product))
            show_404();

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/details';
        
        $this->data['id']       = $product['id'];
        $this->data['recipeId'] = $product['recipeId'];
        $this->data['name']     = $recipe['code'];
        $this->data['description'] = $recipe['description'];
        $this->data['price']    = $product['price'];
        $this->data['inStock'] = $product['inStock'];
        $this->data['promotion'] = $product['promotion'] ? "Yes" : "No";    // TODO: Same as above
        $this->data['backUrl'] = base_url() . "sales";
        
        $this->render();
    }

    public function receipt()
    {
        // TODO: No validation, ordering 0 is okay too. 
        $id = $this->input->post("id");        
        $orderQuantity = $this->input->post("orderQuantity");

        $this->load->model('product');
        $product = $this->product->get($id);
        $recipe  = $this->product->getRecipe($product);

        $productName = $recipe['code'];
        $totalCost = "$" . number_format($orderQuantity * $product['price'], 2);
        $totalCost = moneyFormat($orderQuantity * $product['price']);

        $message = "Ordered $orderQuantity $productName(s) for $totalCost";  

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/receipt';
        $this->data['content'] = $message;
        $this->data['backUrl'] = base_url() . "sales";
        
        $this->render();
    }
    
}
