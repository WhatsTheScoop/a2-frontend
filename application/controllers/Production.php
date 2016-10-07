<?php
/**
 * @author: Spencer
 * Date: 10/2/2016
 * Time: 2:49 PM
 */
class Production extends Application {

    public function index(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/index';

        $this->load->model('Recipe');
        $recipes = $this->Recipe->all();

        $this->data['recipes'] = $recipes;
        $this->render();
    }

    public function show($id){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/show';

        $this->load->model('Recipe');
        $recipe = $this->Recipe->get($id);
       // $this->data['recipe'] = $recipe;

        $ingredients = array();
        
        foreach($recipe['ingredients'] as $key => $quantity){
            if($this->checkStock($key,$quantity)){
                $ingredients[] = array('name' => $this->getName($key), 'quantity' => $quantity, 'oos' => "OUT OF STOCK");
            }
            else{
                $ingredients[] = array('name' => $this->getName($key), 'quantity' => $quantity, 'oos' => false);
            }
        }
        
        $this->data['code'] = $recipe['code'];
        $this->data['description'] = $recipe['description'];
        $this->data['ingredients'] = $ingredients;        
        
        $this->render();
    }
    
    public function checkStock($key, $quantity){
        $this->load->model('Supplies');
        
        $count = $this->Supplies->getById($key)['onHand'];
        return $count < $quantity;
    }
    
    public function getName($id){
        $this->load->model('Supplies');
        
        $item = $this->Supplies->getById($id);
        return $item['name'];
        
    }

}

