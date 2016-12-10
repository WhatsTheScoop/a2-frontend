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

        $this->data['header'] = 'header';        
        $this->data['base_url'] = base_url();        
        $this->data['controller_url'] = base_url() . 'production';
        $this->data['errors'] = "";
    }

    public function index() {
        $this->data['pagebody'] = 'production/index';
        $this->data['recipes'] = $this->Recipe->all();
        
        $this->render();
    }

    public function show($id = 0) {
        $this->load->model('Recipes');
        $recipe = $this->Recipe->get($id);

        if (is_null($recipe))
            show_404();

        //var_dump($recipe);

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/show';

        $ingredients = array();
        //var_dump($this->Recipe->getIngredients($recipe));
        foreach($this->Recipe->getIngredients($recipe) as $item){
            if ($this->checkStock($item['item']['id'],$item['quantity'])) {
                $ingredients[] = array('name' => $item['item']['name'], 'inStock' => $item['quantity'], 'oos' => "OUT OF STOCK");
            } else {
                $ingredients[] = array('name' => $item['item']['name'], 'inStock' => $item['quantity'], 'oos' => "");
            }
        }
        
        $this->data['id'] = $recipe['id'];
        $this->data['code'] = $recipe['code'];
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
        $this->load->model('products');

        $totalOrderCost = 0;
        $message = "";

        var_dump($this->input->post(NULL, TRUE));
        //I know this isn't the best way to do this but for the time being im using it'
        // ... (NULL, TRUE) returns all POST items with XSS filter
        foreach ($this->input->post(NULL, TRUE) as $id => $quantity) {
            

             if ($quantity == 0)
                 continue;
            var_dump("hello in here");
            $this->products->produce($id,$quantity);
            // $this->ingredients->orderMore($id, $quantity);

            // $supplyName = $ingredient['name'];
            // $cost = $quantity * $ingredient['price'];
            // $totalOrderCost = $totalOrderCost + $cost;

            // $formattedCost = moneyFormat($cost);
            $message = $message . "Product has been produced. <br>";
        }

        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/receipt';
        $this->data['content'] = $message;
        $this->data['totalCost'] = moneyFormat($totalOrderCost);
        $this->data['backUrl'] = base_url() . "production";

        $this->render();
    }

}

