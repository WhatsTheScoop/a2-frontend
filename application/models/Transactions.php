<?php

/*
 * @author Spencer Joel 
 */

class Transactions extends MY_Model {

    public static $fields =  ['id','cost','productSold','date'];

    function add($description){
        $date = date("Y/m/d");
        $cost = 1.5;
        $this->db->query("INSERT INTO transactions (cost, productSold, date) VALUES ('{$cost}', '{$description}', '{$date}')");
    }    


}