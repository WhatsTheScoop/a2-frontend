<?php

/*
 * @author Spencer
 * */

class Recipes extends MY_Model {
    
    /* FORMAT 
    array(
        'id' => int,
        'code' => string,k 
        'description' => string, 
        'ingredients' => array(
            array(
                'item' => Ingredient, 
                'quantity' => int 
            ),
            ... 
        )     
    )
    */

	public static $fields =  ['id','code','description','ingredients'];    

    public static $rules = [
        ['field'=>'id', 		'label'=>'Recipe ID',	'rules'=>'integer'],
        ['field'=>'code', 		'label'=>'Name',		'rules'=>'required|alpha_numeric_spaces'],
        ['field'=>'description','label'=>'description',	'rules'=>'required'],
        ['field'=>'ingredients','label'=>'ingredients', 'rules'=>'']
	];

    // Determines how a record should be displayed
    public static function createViewModel($record) {
        $ingredients = array();
        foreach ($record['ingredients'] as $i) {
            array_push($ingredients, [
                'name' => $i['item']['name'],
                'quantity' => $i['quantity']
            ]);
        }

        $record['id']        	= $record['id'];
        $record['code'] 		= ucwords($record['code']);
        $record['description']  = ucfirst($record['description']);
        $record['ingredients']  = $ingredients;

        return $record;
    }

    function getIngredients($recipe) {
        $query = 'SELECT * FROM recipeingredients WHERE recipeid = ' . $recipe['id'];
        $bridgeItems = $this->db->query($query)->result();

        // Retrieve the ingredient details and prepare a result 
        $ingredients = array();
        foreach($bridgeItems as $bi) {
            $bi = get_object_vars($bi);

            $ingredient = $this->Ingredient->get($bi['ingredientid']);

            $item = [
                'item' => $ingredient, 
                'quantity' => (int)$bi['quantity']
            ];
            array_push($ingredients, $item);    
        }

        return $ingredients;
    }

    function add($recipe) {
        // store for ingredient association later 
        $ingredients = $recipe['ingredients'];  
        // Reformat recipe object for addition
        unset($recipe['ingredients']);
        $recipe['id'] = count($this->Recipe->all()) + 1; 

        // add recipe 
        parent::add($recipe);
        // Add ingredient association 
        foreach ($ingredients as $entry) {
            $ingredient = $entry['item'];
            $quantity = $entry['quantity'];
            var_dump("INSERT INTO recipeingredients (recipeid, ingredientid, quantity) VALUES ('{$recipe['id']}', '{$ingredient['id']}', '{$quantity}')");
            $this->db->query("INSERT INTO recipeingredients (recipeid, ingredientid, quantity) VALUES ('{$recipe['id']}', '{$ingredient['id']}', '{$quantity}')");
        }
    }

    function update($recipe) {
        // store for ingredient association later 
        $ingredients = $recipe['ingredients'];  

        // LMMFAO 
        $this->db->delete("recipeingredients",  array("recipeid" => $recipe['id']));

        // edit recipe 
        unset($recipe['ingredients']);        
        parent::update($recipe);

        // edit ingredient association 
        foreach ($ingredients as $entry) {
            $ingredient = $entry['item'];
            $quantity = $entry['quantity'];
            $this->db->query("INSERT INTO recipeingredients (recipeid, ingredientid, quantity) VALUES ('{$recipe['id']}', '{$ingredient['id']}', '{$quantity}')");
        }    
    }

}