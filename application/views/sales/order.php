<h1>Order Details</h1>
<?php

foreach ($_GET as $key => $value) { 
    if($value > 0)
    {
        echo "sold " . $value . " " . $key . "<br>";
    }
    
}
echo "<br>";
?>
<button onclick="location.href='<?php echo base_url()?>sales'">Return</button>
