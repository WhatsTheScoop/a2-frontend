<?php
/**
 * @author: Spencer
 * Date: 10/2/2016
 * Time: 2:49 PM
 */
class Production extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->isUser();
    }

    public function index() {
        $this->data['pagebody'] = 'production/index';

        $products = array();
        foreach ($this->Product->all() as $product) {
            $recipe = $this->Product->getRecipe($product);

            // Create a custom 'object' for the index 
            $viewModel = array();        
            $viewModel['productId'] = $product['id'];
            $viewModel['recipeId']  = $recipe['id'];
            $viewModel['name'] = $recipe['code'];
            $viewModel['description'] = $recipe['description'];
            $viewModel['inStock'] = $product['inStock'];

            array_push($products, $viewModel);
        }

        $this->data['products'] = $products; 
        
        $this->render();
    }

    public function show($id = 0) {
        
        $product = $this->Product->get($id);
        if (is_null($product))
            show_404();
        $recipe = $this->Recipe->get($product['recipeId']);
        $recipeIngredients = $this->Recipe->getIngredients($recipe); 

        $ingredients = array();
        foreach($recipeIngredients as $item){
            if ($this->checkStock($item['item']['id'],$item['quantity'])) {
                $ingredients[] = array('name' => $item['item']['name'], 'inStock' => $item['quantity'], 'oos' => "OUT OF STOCK");
            } else {
                $ingredients[] = array('name' => $item['item']['name'], 'inStock' => $item['quantity'], 'oos' => "");
            }
        }

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/show';
        $this->data['id'] = $product['id'];
        $this->data['name'] = $recipe['code'];
        $this->data['description'] = $recipe['description'];
        $this->data['ingredients'] = $ingredients;
        $this->data['backUrl'] = base_url() . "production";       
        
        $this->render();
    }
    
    public function checkStock($key, $inStock) {
        $this->load->model('ingredients');
        $count = $this->ingredients->get($key)['onHand'];
        return $count < $inStock;
    }

    public function receipt()
    {
        $totalOrderCost = 0;
        $message = "";

        //I know this isn't the best way to do this but for the time being im using it'
        // ... (NULL, TRUE) returns all POST items with XSS filter
        foreach ($this->input->post(NULL, TRUE) as $id => $quantity) {
            
            if ($quantity == 0)
                continue;

            $error = $this->Product->produce($id,$quantity);
            
            $product = $this->Product->get($id);

            if ($error != null) {
                $message = $message . " Error producing ID:" . $id . " - " . $error; 
                unset($error);
                continue;
            }

            $message = $message . " Produced " . $quantity . " product(s) with ID: " . $id . " <br>";
        }

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/receipt';
        $this->data['content'] = $message;
        $this->data['totalCost'] = moneyFormat($totalOrderCost);
        $this->data['backUrl'] = base_url() . "production";

        $this->render();
    }

}

