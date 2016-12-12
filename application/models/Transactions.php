<?php

/*
 * @author Spencer Joel 
 */

class Transactions extends MY_Model {

    public static $fields =  ['id','cost','productSold','date'];

    function add($item){
        $date = date("Y/m/d");
        $this->db->query("INSERT INTO transactions (cost, productSold, date) VALUES ('{$item['price']}', '{$item['name']}', '{$date}')");
    }    
}
