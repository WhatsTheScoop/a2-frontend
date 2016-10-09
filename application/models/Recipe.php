<?php

/*
 * @author Spencer
 * */

class Recipe extends CI_Model{
    
    var $data = array(
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

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single recipe
	public function get($selected)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $recipe){
			if ($recipe['id'] == $selected)
				return $recipe;
        }
		return null;
	}

	// retrieve all of the recipes
	public function all()
	{
		return $this->data;
	}
    
}