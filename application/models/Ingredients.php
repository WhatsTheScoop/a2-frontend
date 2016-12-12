<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ingredients extends CI_Model{
    
	public static $fields =  ['id','name','price','type','perBox','onHand'];

    public static $rules = [
        ['field'=>'id',     'label'=>'Ingredient ID',   'rules'=>'required|integer'],
        ['field'=>'name', 	'label'=>'Name',	        'rules'=>'required|alpha_numeric_spaces'],
        ['field'=>'price', 	'label'=>'Price',	        'rules'=>'required|decimal'],
        ['field'=>'type', 	'label'=>'Type',            'rules'=>'required|alpha'],
		['field'=>'perBox',	'label'=>'# per Box',       'rules'=>'required|integer|greater_than[0]'],
        ['field'=>'onHand', 'label'=>'On Hand',         'rules'=> 'required|integer|greater_than_equal_to[0]']
	];

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

	// Get number of ingredients on hand in the back-end (warehouse)
	function getOnHand($id) {
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return (int)$this->rest->get('/SuppliesAPI/onhand/id/' . $id);
	}

	// Place an order for more of an ingredient to the back-end (warehouse)
	function orderMore($id, $numOfBoxes) {
        
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $ingedient = $this->get($id);
        $item['name'] = $ingedient['name'];
        $item['price'] = $ingedient['price'] * $numOfBoxes * -1;
        $this->Transaction->add($item);
        return $this->rest->put('/SuppliesAPI/receive/id/' . $id . '/quantity/' . $numOfBoxes);// TODO: Returning just an OK message 
	}

	// Use an ingredient stored in the back-end (warehouse)
	function consumeIngredient($id, $numTaken) {
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->put('/SuppliesAPI/take/id/' . $id . '/quantity/' . $numTaken);	// TODO: Returning just an OK message 
	}

    // Return all records as an array of objects
    function all() {
		$this->rest->initialize(array('server' => REST_SERVER));       
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $records = $this->rest->get('/SuppliesAPI/item');
        $results = array();
        foreach ($records as $r) 
            array_push($results, get_object_vars($r));
        return $results;
    }

    // Retrieve an existing DB record as an object
    function get($id) {
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$record = $this->rest->get('/SuppliesAPI/item/id/' . $id);
        return get_object_vars($record[0]);
    }

    function getByKey($key, $value) {
        $all = $this->all();
        foreach ($all as $i) 
            if (strtolower($i[$key]) == strtolower($value)) 
                return $i;
    }

	// Determine if a record exists
    function exists($id)
	{
		$result = $this->get();
		return !empty($result);
	}

}