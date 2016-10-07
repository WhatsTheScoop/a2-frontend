<h1>Receiving receipt Details</h1>
<?php

foreach ($_GET as $key => $value) { 
    if($value > 0)
    {
        echo "Recieved " . $value . " " . $key . "<br>";
    }
    
}
echo "<br>";
?>
<button onclick="location.href='<?php echo base_url()?>receiving'">Return</button>
