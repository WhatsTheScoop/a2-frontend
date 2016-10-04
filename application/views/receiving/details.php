<h1>Product Details</h1>

<!--Still need an action here for form submission-->
<table class="table" action="">
    <tr>    
        <th>Product ID</th>
        <td><?= $ingredient['id'] ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?= $ingredient['name'] ?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?= $ingredient['price'] ?></td>
    </tr>
    <tr>
        <th>Category</th>
        <td><?= $ingredient['type'] ?></td>
    </tr>
    <tr>
        <th>Quantity per</th>
        <td><?= $ingredient['quantity'] ?></td>
    </tr>
</table>
<button onclick="location.href='<?php echo base_url()?>receiving'">Return</button>
