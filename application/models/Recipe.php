<?php

/*
 * @author Spencer
 * */

class Recipe extends CI_Model{
    
	public static $fields =  ['id','code','description','ingredients'];

    public static $rules = [
        ['field'=>'id', 		'label'=>'Recipe ID',	'rules'=>'required|integer'],
        ['field'=>'code', 		'label'=>'Name',		'rules'=>'required|alpha_numeric_spaces'],
        ['field'=>'description','label'=>'description',	'rules'=>'required|alpha_numeric_spaces'],
        ['field'=>'ingredients','label'=>'ingredients', 'rules'=>'']
	];

    public static $data = array(
		array('id' => '0',  'code' => 'Child Cone', 'description' => 'One small scoop of vanilla, perfect for a child!',  'ingredients' =>
			array('1' => 1, '3' => 1)),
		array('id' => '1',  'code' => 'Large Vanilla', 'description' => 'Two scoops of vanilla goodness.',  'ingredients' =>
			array('0'=> 1,'3'=> 2)),
        array('id' => '2',  'code' => 'Small Chocolate', 'description' => 'One scoop of chocolate, just enough to make you want more!',  'ingredients' =>
			array('1'=> 1,'5'=> 1)),
        array('id' => '3',  'code' => 'Large Chocolate', 'description' => 'Two scoops of chocolate, we won\'t tell if you don\'t!',  'ingredients' =>
			array('0'=> 1,'5'=> 2)),
        array('id' => '4',  'code' => 'Chocolate Extreme', 'description' => 'Two scoops of chocolate, plus toppings, everyone loves chocolate!',  'ingredients' =>
			array('2'=> 1,'5'=> 2, '11'=>1)),
        array('id' => '5',  'code' => 'Napolean', 'description' => 'One scoop of vanilla, chocolate, and strawberry!',  'ingredients' => 
			array('0'=> 1,'5'=> 1, '3' => 1, '4' => 1)),
        array('id' => '6',  'code' => 'Feeling Nutty', 'description' => 'One scoop of maple, with lots of walnuts for a topping!',  'ingredients' => 
			array('0'=> 1,'7'=> 1,'10'=>1)),
        array('id' => '7',  'code' => 'Minty Fresh', 'description' => 'One scoop of mint ice cream.',  'ingredients' => 
			array('1'=> 1,'6'=> 1)),
        array('id' => '8',  'code' => 'Oh Canada', 'description' => 'Two scoops of maple ice cream.',  'ingredients' => 
			array('0'=> 1,'7'=> 2)),
        array('id' => '9',  'code' => 'Attempted Rainbow', 'description' => 'One scoop of strawberry, orange, vanilla, and chocolate!',  'ingredients' => 
			array('2'=> 1,'3'=> 1, '4'=> 3, '8'=> 1, '5'=> 1,'9'=>1)),
        array('id' => '10', 'code' => 'I can\'t Choose', 'description' => 'One scoop of each ice cream with all of the toppings!',  'ingredients' => 
			array('2'=> 1, '3'=> 1, '4'=> 3, '8'=> 1, '5'=> 1, '6'=> 1, '7'=> 1, '9'=>1, '10'=> 1, '11'=>1)),
        array('id' => '11', 'code' => 'Forgetting Something', 'description' => 'Hmm is something missing?',  'ingredients' => 
			array('0'=> 1, '9'=>1, '10'=> 1, '11'=>1))
	);

    // Determines how a record should be displayed
    public static function createViewModel($record) {
        $record['id']        	= $record['id'];
        $record['code'] 		= ucwords($record['code']);
        $record['description']  = ucfirst($record['description']);
        $record['ingredients']  = $record['ingredients'];	// TODO
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
		return Recipe::$data;
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->get('/Recipes');
    }

    // Retrieve an existing DB record as an object
    function get($id) {
		//// DEBUG 
		foreach (Recipe::$data as $p)
			if ($p['id'] == $id)
				return $p; 
		//// END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->get('/Recipes/item/id/' . $id);
    }

	// Gets the associated recipe of a recipe
	public function getRecipe($recipe) {
		$this->load->model('recipe');
		return $this->recipe->get($recipe['recipeId']);
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
        $retrieved = $this->rest->post('/Recipes/item/id/' . $record['id'], $record);
    }

    // Get a blank object.
    function create()
    {
        $object = array();
        foreach (Recipe::$fields as $name)
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
        $retrieved = $this->rest->put('/Recipes/item/id' . $record['id'], $record);
    }

	    // Delete a record from the DB
    function delete($id)
    {
        ////DEBUG
        return;
        ////END DEBUG 
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		return $this->rest->delete('/Recipes/item/id/' . $id);
    }

    
}