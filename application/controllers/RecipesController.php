<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class RecipesController extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // GET: /Recipe/
    public function index() {
        $this->data['pagetitle'] = 'Recipes';
        $this->data['pagebody'] = 'Recipes/index';
        
        $records = array();
        foreach ($this->Recipe->all() as $r) {
            $r['ingredients'] = $this->Recipe->getIngredients($r);
            array_push($records, Recipes::createViewModel($r));
        }

        $this->data['models'] = $records;
        $this->data['backUrl'] = base_url();
        
        $this->render();
    }

    // GET: /Recipe/create
    public function create() {
        $this->data['pagetitle'] = 'Create a Recipe';
        $this->data['pagebody'] = 'Recipes/create';

        // check for form submission
        if ($this->input->post()) {
            
            $record = $this->input->post();
            $record['ingredients'] = array();

            // Check if model is valid 
            $this->form_validation->set_rules(Recipes::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($record);
                $this->render();
            } else {
                // ~Valid, continue checking ingredients 

                $errors = $this->checkIngredients($record);
                if ($errors != null) {
                    $this->data['errors'] = $errors;
                    $this->data['model'] = array($record);
                    $this->render();
                    return;
                }
                // Add to server 
                $this->Recipe->add($record);
                $this->redirectToIndex();
            }

        // else, blank slate 
        } else {
            $this->data['model'] = array($this->Recipe->create());
            $this->render();
        }

    }
    
    // GET: /Recipe/details/1    
    public function details($id) {
        $this->data['pagetitle'] = 'Recipe Details';
        $this->data['pagebody'] = 'Recipes/details';
        
        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return;
        } else {
            $Recipe = Recipes::createViewModel($Recipe);
            $this->data['model'] = array($Recipe);
            $this->render();                
        }        
    }

    // GET: /Recipe/edit/1
    public function edit($id) {
        $this->data['pagetitle'] = 'Edit Recipe';
        $this->data['pagebody'] = 'Recipes/edit';

        // Check if record exists 
        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return; 
        } 

        // Check for form submission 
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Recipes::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($Recipe);
                $this->render();
            } else {
                // ~Valid, continue checking ingredients 

                $errors = $this->checkIngredients($record);
                if ($errors != null) {
                    $this->data['errors'] = $errors;
                    $this->data['model'] = array($record);
                    $this->render();
                    return;
                }
                // Add to server 
                $this->Recipe->update($record);
                $this->redirectToIndex();
            }

        // Else load record data 
        } else {
            $this->data['model'] = array($Recipe);
            $this->render();        
        }   

    }

    // GET: /Recipe/delete/1
    public function delete($id) {
        $this->data['pagetitle'] = 'Delete Recipe';
        $this->data['pagebody'] = 'Recipes/delete';

        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return;
        } else {
            $this->data['model'] = array($Recipe);
            $this->render();
        }      

    }

    // POST: /Recipe/delete_confirmed/1
    public function delete_confirmed($id) {
        $this->Recipe->delete($id);
        // check if ok ? 
        $this->redirectToIndex();
    }



    /* Helpers */

    private function notFound($id) {
        $this->data['pagebody'] = 'errors/html/error_404';
        $this->data['error_title'] = 'Recipe not found';
        $this->data['error_message'] = 'A Recipe with ID ' . $id . ' could not be found.';
        $this->data['error_return_url'] = base_url() . 'Recipes';
        $this->render();
    }

    /**
    * Check if a POST record's ingredients are valid and reformats the 
    * record (to one that corresponds to Ingredient model) ready for upload. 
    * If invalid, it'll return a error message.
    */
    private function checkIngredients(&$record) {
        $record['ingredients'] = array();

        $ingredientNames = $record['ingredient_name'];
        $ingredientQuantities = $record['ingredient_quantity'];
        // Note: The array lengths will always be the same by design  

        // Check and reformat all ingredients 
        for ($i = 0; $i < count($ingredientNames); $i++) {
            $name = $ingredientNames[$i];
            $quantity = $ingredientQuantities[$i];

            // Check for name and quantity existance 
            if (empty($name) || empty($quantity)) {
                return "Ingredient name and quantity must both be filled out";
            } 
            
            $ingredient = $this->Ingredient->getByKey('name', $name);

            // Check for an existing ingredient 
            if ($ingredient == null) {
                return "Ingredient " . $name . " could not be found.";
            }

            // Ingredient OK, reformat into record 
            array_push($record['ingredients'], array(
                'item' => $ingredient, 
                'quantity' => $quantity
            ));
            unset($ingredient);
        }
        unset($record['ingredient_name']);
        unset($record['ingredient_quantity']);
        return null;
    }

}
