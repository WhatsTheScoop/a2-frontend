<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ingredient extends CI_Model{
    
	public static $fields =  ['id','name','price','type','perBox','onHand'];

    public static $rules = [
        ['field'=>'id',     'label'=>'Ingredient ID',   'rules'=>'required|integer'],
        ['field'=>'name', 	'label'=>'Name',	        'rules'=>'required|alpha_numeric_spaces'],
        ['field'=>'price', 	'label'=>'Price',	        'rules'=>'required|decimal'],
        ['field'=>'type', 	'label'=>'Type',            'rules'=>'required|alpha'],
		['field'=>'perBox',	'label'=>'# per Box',       'rules'=>'required|integer|greater_than[0]'],
        ['field'=>'onHand', 'label'=>'On Hand',         'rules'=> 'required|integer|greater_than_equal_to[0]']
	];

    public static $data = array(
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
        $record['id']     = $record['id'];
        $record['name']   = ucwords($record['name']);
        $record['price']  = moneyFormat($record['price']);
        $record['type']   = ucwords($record['type']);
        $record['perBox'] = $record['perBox'];
        $record['onHand'] = $record['onHand'];
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
		return Ingredient::$data;
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->get('/Ingredients');
    }

    // Retrieve an existing DB record as an object
    function get($id) {
		//// DEBUG 
		foreach (Ingredient::$data as $p)
			if ($p['id'] == $id)
				return $p; 
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->get('/Ingredients/item/id/' . $id);
    }

    function getByKey($key, $value) {
        //// DEBUG 
        foreach (Ingredient::$data as $i) 
            if (strtolower($i[$key]) == strtolower($value)) 
                return $i;
        //// END DEBUG 
        $all = $this->all();
        foreach ($all as $i) 
            if (strtolower($i[$key]) == strtolower($value)) 
                return $i;
    }

	// Gets the associated recipe of a ingredient
	public function getRecipe($ingredient) {
		$this->load->model('recipe');
		return $this->recipe->get($ingredient['recipeId']);
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
        $retrieved = $this->rest->post('/Ingredients/item/id/' . $record['id'], $record);
    }

    // Get a blank object.
    function create()
    {
        $object = array();
        foreach (Ingredient::$fields as $name)
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
        $retrieved = $this->rest->put('/Ingredients/item/id' . $record['id'], $record);
    }

	    // Delete a record from the DB
    function delete($id)
    {
        ////DEBUG
        return;
        ////END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->delete('/Ingredients/item/id/' . $id);
    }

}