<?php

/*
 * @author Spencer
 * */

class Recipe extends CI_Model{
    
    var $data = array(
		array('id' => '0',  'code' => 'Child Cone',    'description' => 'One small scoop of vanilla, perfect for a child!',  'ingredients' =>
			array('cone' => '1 Regular Cone', 'icecream' => '1 Scoop Vanilla', 'garnish'=>'none')),
		array('id' => '1',  'code' => 'Large Vanilla',    'description' => 'Two scoops of vanilla goodness.',  'ingredients' =>
			array('cone'=> '1 Waffle Cone','icecream'=> '2 Scoops Vanilla', 'garnish'=> 'none')),
        array('id' => '2',  'code' => 'Small Chocolate',    'description' => 'One scoop of chocolate, just enough to make you want more!',  'ingredients' =>
			array('cone'=> '1 Regular Cone','icecream'=> '1 Scoop Chocolate','garnish'=> 'none')),
        array('id' => '3',  'code' => 'Large Chocolate',    'description' => 'Two scoops of chocolate, we won\'t tell if you don\'t!',  'ingredients' =>
			array('cone'=> '1 Waffle Cone','icecream'=>'2 Scoops of choclate','garnish'=>'none')),
        array('id' => '4',  'code' => 'Chocolate Extreme',    'description' => 'Two scoops of chocolate, plus toppings, everyone loves chocolate!',  'ingredients' =>
			array('cone'=> 'Plastic cup','icecream'=>'2 Scoops of chocolate','garnish'=>'1 Server of chocolate chips')),
        array('id' => '5',  'code' => 'Napolean',    'description' => 'One scoop of vanilla, chocolate, and strawberry!',  'ingredients' => 
			array('cone'=> 'Waffle Cone','icecream'=>'1 Scoop chocolate, vanilla, and strawberry','garnish'=>'none')),
        array('id' => '6',  'code' => 'Feeling Nutty',    'description' => 'One scoop of maple, with lots of walnuts for a topping!',  'ingredients' => 
			array('cone'=> 'Waffle Cone','icecream'=>'1 Scoop Maple','garnish'=>'1 Server walnuts')),
        array('id' => '7',  'code' => 'Minty Fresh',    'description' => 'One scoop of mint ice cream.',  'ingredients' => 
			array('cone'=> 'Regular Cone','icecream'=>'1 Scoop Mint','garnish'=>'none')),
        array('id' => '8',  'code' => 'Oh Canada',    'description' => 'Two scoops of maple ice cream.',  'ingredients' => 
			array('cone'=> 'Waffle Cone','icecream'=>'2 Scoop maple','garnish'=>'none')),
        array('id' => '9',  'code' => 'Attempted Rainbow',    'description' => 'One scoop of strawberry, orange, vanilla, and chocolate!',  'ingredients' => 
			array('cone'=> 'Plastic cup','icecream'=>'1 Scoop strawberry, orange, vanilla, and chocolate','garnish'=>'1 Server Sprinkles')),
        array('id' => '10',  'code' => 'I can\'t Choose',    'description' => 'One scoop of each ice cream with all of the toppings!',  'ingredients' => 
			array('cone'=> 'Plastic Cup','icecream'=>'1 Scoop vanilla, chocolate, mint, orange, maple, and strawberry','garnish'=>'1 Serving chocolate chips, walnuts, and sprinkles')),
        array('id' => '11',  'code' => 'Forgetting Something',    'description' => 'Hmm is something missing?',  'ingredients' => 
			array('cone'=> 'Waflle Cone','icecream'=>'none','garnish'=>'1 Serving chocolate chips, walnuts, and sprinkles'))
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