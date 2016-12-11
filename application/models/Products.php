<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends MY_Model {
    
	public static $fields =  ['id','recipeId','price','inStock','promotion'];

    public static $rules = [
        ['field'=>'id', 		'label'=>'Product ID',	'rules'=>'required|integer'],
        ['field'=>'recipeId', 	'label'=>'Recipe ID',	'rules'=>'required|integer'],
        ['field'=>'price', 		'label'=>'Item price',	'rules'=>'required|decimal'],
        ['field'=>'inStock', 	'label'=>'Stock on hand', 'rules'=>'required|integer|greater_than_equal_to[0]'],
		['field'=>'promotion',	'label'=>'Promotion',	'rules'=>'integer']
	];

	// public static $data = array(
	// 	array('id' => '0',  'recipeId' => 0,   'price' => 1.00, 'inStock' => 60, 	'promotion' => true),
	// 	array('id' => '1',  'recipeId' => 1,   'price' => 2.00, 'inStock' => 20, 	'promotion' => true),
    //     array('id' => '2',  'recipeId' => 2,   'price' => .35, 	'inStock' => 50, 	'promotion' => false),
    //     array('id' => '3',  'recipeId' => 3,   'price' => .80, 	'inStock' => 10, 	'promotion' => false),
    //     array('id' => '4',  'recipeId' => 4,   'price' => .500, 'inStock' => 0, 	'promotion' => false),
    //     array('id' => '5',  'recipeId' => 5,   'price' => .50, 	'inStock' => 30, 	'promotion' => false),
    //     array('id' => '6',  'recipeId' => 6,   'price' => .20, 	'inStock' => 100,	'promotion' => true),
    //     array('id' => '7',  'recipeId' => 7,   'price' => .60, 	'inStock' => 8,   	'promotion' => false),
    //     array('id' => '8',  'recipeId' => 8,   'price' => 1.20, 'inStock' => 30, 	'promotion' => false),
    //     array('id' => '9',  'recipeId' => 9,   'price' => 30.00,'inStock' => 50, 	'promotion' => true),
    //     array('id' => '10', 'recipeId' => 10,  'price' => 10, 	'inStock' => 60, 	'promotion' => true),
    //     array('id' => '11', 'recipeId' => 11,  'price' => 5, 	'inStock' => 70, 	'promotion' => false),
	// );

    // Determines how a record should be displayed
    public static function createViewModel($record) {
        $record['id']        = $record['id'];
        $record['recipeId']  = $record['recipeId'];
        $record['price']     = moneyFormat($record['price']);
        $record['inStock']   = $record['inStock'];
        $record['promotion'] = $record['promotion'] ? "Yes" : "No";    
        return $record;
    }

	// constructor
    function __construct() {
        parent::__construct();
    }

    function produce($id, $quantity) {
        // check for valid quantity 
        if ($quantity <= 0) {
            return "You must order more than 0 boxes!";
        }
        
        $product = $this->get($id);
        
        // check for valid product 
        if ($product == null) {
            return "Could not find a product with ID " . $id; 
        }

        $recipe = $this->getRecipe($product);
        $ingredients = $this->Recipe->getIngredients($recipe);
        // check for enough ingredients 
        foreach ($ingredients as $entry) {
            $ingredient = $entry['item'];
            $quantityRequired = $entry['quantity'];

            if ($quantityRequired * $quantity > $this->Ingredient->getOnHand($ingredient['id'])) {
                return "Not enough ingredients.";   // TODO: More sophisticated error message (requires getting the entire ingredient.)
            }
        }

        // take the ingredients from the back-end (warehouse)
        foreach ($ingredients as $entry) {
            $ingredient = $entry['item'];
            $quantityRequired = $entry['quantity'];

            $this->Ingredient->consumeIngredient($ingredient['id'], $quantityRequired * $quantity);
        }

        // add to produced quantity to stock  
        $product['inStock'] = $product['inStock'] + $quantity;
        $this->update($product);
    }

    function sell($product, $quantity) {
        $product['inStock'] = $product['inStock'] - $quantity; 
        if ($product['inStock'] < 0) {
            return "Error: You don't have enough " . $product['name'] . " in stock.";
        }
        $this->update($product);
    }

//// REMOVE 
    // Convenience method for adding to stock 
    function addToStock($id, $quantity) {
        $record = $this->get($id);
        $record['inStock'] = $record['inStock'] + $quantity;
        $this->update($record);
    }

    // Convenience method for removing from stock 
    function removeFromStock($id, $quantity) {
        $record = $this->get($id);
        $record['inStock'] = $record['inStock'] - $quantity;

        if ($record['inStock'] < 0)
            return "There's not enough " . $record['name'] . "!";

        $this->update($record);
    }
//// END REMOVE 

/// SECTION: CRUD

    // Gets the associated recipe of a product
	public function getRecipe($product) {
		return $this->Recipe->get($product['recipeId']);
	}

/// end section: CRUD  

}