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
        $this->load->model('products');
        $this->load->model('salesLog');
        //$this->salesLog->add('test');
        $products = $this->products->all();

        // Format the data 
        $productList = array();
        foreach($products as $p){
            $productList[] = array(
                'id'          => $p['id'],
                'name'        => $this->products->getRecipe($p)['code'],
                'description' => $this->products->getRecipe($p)['description'],                
                'price'       => "$".number_format($p['price'], 2),
                'inStock'     => $p['inStock'],
                'promotion'   => $p['promotion'] ? "Yes" : "No",    // TODO: Not sure if the presenting logic should be here.                
            );
        }

        $this->data['products'] = $productList;
        $this->render();
    }
    
    public function show($id = 0) {
        $this->load->model('products');
        $product = $this->products->get($id);
        $recipe  = $this->products->getRecipe($product);

        if (is_null($product))
            show_404();

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/show';
        
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
        $this->load->model('products');

        $totalOrderCost = 0;
        $message = "";
        //var_dump($this->input->post(NULL, TRUE));
        // ... (NULL, TRUE) returns all POST items with XSS filter
        foreach ($this->input->post(NULL, TRUE) as $id => $quantity) {

            if ($quantity == 0)
                continue;

            $product = $this->products->get($id);
            $recipe  = $this->products->getRecipe($product);
            // var_dump($id);
            $this->products->sell($product,$quantity);

            $productName = $recipe['code'];
            $cost = $quantity * $product['price'];
            $totalOrderCost = $totalOrderCost + $cost;

            $formattedCost = moneyFormat($cost);
            $message = $message . "Ordered $quantity $productName(s) for $formattedCost <br>";
        }

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'sales/receipt';
        $this->data['content'] = $message;
        $this->data['totalCost'] = moneyFormat($totalOrderCost);
        $this->data['backUrl'] = base_url() . "sales";

        $this->render();
    }
    
}
