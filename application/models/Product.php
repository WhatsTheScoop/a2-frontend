<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends CI_Model{
    
	// Note: I omitted name and description as they can be found in the recipe model. 
    var $data = array(
		array('id' => '0',  'recipeId' => 0,   'price' => 100, 	'quantity' => 60, 	'promotion' => true),
		array('id' => '1',  'recipeId' => 1,   'price' => 200, 	'quantity' => 20, 	'promotion' => true),
        array('id' => '2',  'recipeId' => 2,   'price' => 35, 	'quantity' => 50, 	'promotion' => false),
        array('id' => '3',  'recipeId' => 3,   'price' => 80, 	'quantity' => 10, 	'promotion' => false),
        array('id' => '4',  'recipeId' => 4,   'price' => 500, 	'quantity' => 0, 	'promotion' => false),
        array('id' => '5',  'recipeId' => 5,   'price' => 50, 	'quantity' => 30, 	'promotion' => false),
        array('id' => '6',  'recipeId' => 6,   'price' => 20, 	'quantity' => 100,	'promotion' => true),
        array('id' => '7',  'recipeId' => 7,   'price' => 60, 	'quantity' => 8,   	'promotion' => false),
        array('id' => '8',  'recipeId' => 8,   'price' => 120, 	'quantity' => 30, 	'promotion' => false),
        array('id' => '9',  'recipeId' => 9,   'price' => 3000,	'quantity' => 50, 	'promotion' => true),
        array('id' => '10', 'recipeId' => 10,  'price' => 10, 	'quantity' => 60, 	'promotion' => true),
        array('id' => '11', 'recipeId' => 11,  'price' => 5, 	'quantity' => 70, 	'promotion' => false),
	);

	// Constructor
	public function __construct() {
		parent::__construct();
	}

	// retrieve all products 
	public function all() {
		return $this->data;
	}

	// Get a product record via id 
	public function get($id) {
		foreach ($this->data as $p)
			if ($p['id'] == $id)
				return $p; 
		return null;
	}

	// Gets the associated recipe of a product
	public function getRecipe($product) {
		$this->load->model('recipe');
		return $this->recipe->get($product['recipeId']);
	}
    
}