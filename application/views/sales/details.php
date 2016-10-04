<h1>Product Details</h1>

<!--Still need an action here for form submission-->
<table class="table" action="">
    <tr>    
        <th>Product ID</ht>
        <td>{id}</td>
    </tr>
    <tr>
        <th>Recipe ID</th>
        <td>{recipeId}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{name}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{description}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{price}</td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td>{quantity}</td>
    </tr>
    <tr>
        <th>On Promotion</th>
        <td>{promotion}</td>
    </tr>
</table>
<button onclick="location.href='<?php echo base_url()?>sales'">Return</button>
