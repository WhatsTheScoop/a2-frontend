<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends CI_Model{
    
	public static $fields =  ['id','recipeId','price','inStock','promotion'];

    public static $rules = [
        ['field'=>'id', 		'label'=>'Product ID',	'rules'=>'required|integer'],
        ['field'=>'recipeId', 	'label'=>'Recipe ID',	'rules'=>'required|integer'],
        ['field'=>'price', 		'label'=>'Item price',	'rules'=>'required|decimal'],
        ['field'=>'inStock', 	'label'=>'Stock on hand', 'rules'=>'required|integer|greater_than_equal_to[0]'],
		['field'=>'promotion',	'label'=>'Promotion',	'rules'=>'integer']
	];

	public static $data = array(
		array('id' => '0',  'recipeId' => 0,   'price' => 1.00, 	'inStock' => 60, 	'promotion' => true),
		array('id' => '1',  'recipeId' => 1,   'price' => 2.00, 	'inStock' => 20, 	'promotion' => true),
        array('id' => '2',  'recipeId' => 2,   'price' => .35, 	'inStock' => 50, 	'promotion' => false),
        array('id' => '3',  'recipeId' => 3,   'price' => .80, 	'inStock' => 10, 	'promotion' => false),
        array('id' => '4',  'recipeId' => 4,   'price' => .500, 	'inStock' => 0, 	'promotion' => false),
        array('id' => '5',  'recipeId' => 5,   'price' => .50, 	'inStock' => 30, 	'promotion' => false),
        array('id' => '6',  'recipeId' => 6,   'price' => .20, 	'inStock' => 100,	'promotion' => true),
        array('id' => '7',  'recipeId' => 7,   'price' => .60, 	'inStock' => 8,   	'promotion' => false),
        array('id' => '8',  'recipeId' => 8,   'price' => 1.20, 	'inStock' => 30, 	'promotion' => false),
        array('id' => '9',  'recipeId' => 9,   'price' => 30.00,	'inStock' => 50, 	'promotion' => true),
        array('id' => '10', 'recipeId' => 10,  'price' => 10, 	'inStock' => 60, 	'promotion' => true),
        array('id' => '11', 'recipeId' => 11,  'price' => 5, 	'inStock' => 70, 	'promotion' => false),
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
        $object = new StdClass;
        foreach ($fields as $name)
            $object->$name = "";
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