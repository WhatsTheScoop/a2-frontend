<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ingredient extends CI_Model{
    
	public static $fields =  ['id','name','price','type','perBox','onHand'];

    public static $rules = [
        ['field'=>'id', 		'label'=>'Product ID',	'rules'=>'required|integer'],
        ['field'=>'name', 	'label'=>'Recipe ID',	'rules'=>'required|integer'],
        ['field'=>'price', 		'label'=>'Item price',	'rules'=>'required|decimal'],
        ['field'=>'type', 	'label'=>'Stock on hand', 'rules'=>'required|integer|greater_than_equal_to[0]'],
		['field'=>'perBox',	'label'=>'Promotion',	'rules'=>'integer'],
        ['field'=>'onHand']
	];

    var $data = array(
		array('id' => '0',  'name' => 'Waffle Cone',    'price' => 50,  'type' => 'container',  'perBox' => 60, 'onHand' => 10),
		array('id' => '1',  'name' => 'Regular Cone',   'price' => 25,  'type' => 'container',  'perBox' => 60, 'onHand' => 10),
        array('id' => '2',  'name' => 'Plastic Cup',    'price' => 15,  'type' => 'container',  'perBox' => 50, 'onHand' => 10),
        array('id' => '3',  'name' => 'Vanilla',        'price' => 20,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '4',  'name' => 'Strawberry',     'price' => 20,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '5',  'name' => 'Chocolate',      'price' => 20,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '6',  'name' => 'Mint',           'price' => 25,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '7',  'name' => 'Maple',          'price' => 25,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '8',  'name' => 'Orange',         'price' => 25,  'type' => 'icecream',  'perBox' => 45, 'onHand' => 10),
        array('id' => '9',  'name' => 'Sprinkles',      'price' => 18,  'type' => 'garnish',  'perBox' => 120, 'onHand' => 10),
        array('id' => '10', 'name' => 'Walnuts',        'price' => 35,  'type' => 'garnish',  'perBox' => 85, 'onHand' => 0),
        array('id' => '11', 'name' => 'Chocolate Chips','price' => 13,  'type' => 'garnish',  'perBox' => 100, 'onHand' => 10),
	);

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
        $this->load->library(['curl', 'format', 'rest']);
    }

    // Return all records as an array of objects
    function all() {
		//// DEBUG 
		return Product::$data;
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->get('/Products');
    }

    // Retrieve an existing DB record as an object
    function get($id) {
		//// DEBUG 
		foreach (Product::$data as $p)
			if ($p['id'] == $id)
				return $p; 
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->get('/Products/item/id/' . $id);
    }

	// Gets the associated recipe of a product
	public function getRecipe($product) {
		$this->load->model('recipe');
		return $this->recipe->get($product['recipeId']);
	}

	// Determine if a record exists
    function exists($id)
	{
		$result = $this->get();
		return !empty($result);
	}

    // Add a record to the DB
    function add($record)
    {
        ////DEBUG 
        return;
        ////END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $retrieved = $this->rest->post('/Products/item/id/' . $record['id'], $record);
    }

    // Get a blank object.
    function create()
    {
        $object = array();
        foreach (Product::$fields as $name)
            $object[$name] = "";
        return $object;
    }

    // Update a record in the DB
    function update($record)
    {  
        ////DEBUG
        return; 
        ////END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $retrieved = $this->rest->put('/Products/item/id' . $record['id'], $record);
    }

	    // Delete a record from the DB
    function delete($id)
    {
        ////DEBUG
        return;
        ////END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->delete('/Products/item/id/' . $id);
    }

}
   
/*
//// NOT USED 
class ProductModel {
	var $id; 
	var $recipeId; 
	var $price; 
	var $inStock; 
	var $promotion;
}
*/