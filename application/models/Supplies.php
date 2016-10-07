<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Supplies extends CI_Model{
    
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

	// Constructor
	public function __construct() {
		parent::__construct();
	}

	// retrieve a single ingredient 
	public function get($id) {
		foreach ($this->data as $ingredient)
			if ($ingredient['id'] == $id)
				return $ingredient; 
		return null;
	}

	// retrieve all of the quotes
	public function all() {
		return $this->data;
	}
    
}