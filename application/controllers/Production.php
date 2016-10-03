<?php
/**
 * @author: Spencer
 * Date: 10/2/2016
 * Time: 2:49 PM
 */
class Production extends Application {

    public function index(){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/index';

        $this->load->model('Recipe');
        $recipes = $this->Recipe->all();

        foreach($recipes as $recipe)
        {
            $cells[] = $this->parser->parse('production/_cell', (array) $recipe, true);
        }

        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class ="recipes">',
            'cell_start' => '<td class ="onerecipe">'
        );
        $this->table->set_template($parms);

        $rows = $this->table->make_columns($cells, 1);
        $this->data['thetable'] = $this->table->generate($rows);
        $this->render();
    }

    public function show($id){
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'production/show';

        $this->load->model('Recipe');
        $recipe = $this->Recipe->get($id);
       // $this->data['recipe'] = $recipe;

        $this->data['code'] = $recipe['code'];
        $this->data['description'] = $recipe['description'];
        $toppings = $recipe['ingredients'];
        $this->data['cone'] = $toppings['cone'];
        $this->data['icecream'] = $toppings['icecream'];
        $this->data['garnish'] = $toppings['garnish'];
        $this->render();
    }

}

