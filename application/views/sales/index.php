<h1> Welcome To Sales</h1>

<!--Still need an action here for form submission-->
<table class="table" action="">
    <thead>    
        <th>Name</th>
        <th>Description</th>        
        <th>Price</th>
        <th>In Stock</th>
        <th>On promotion</th>        
    </thead>
    <form action="/sales/receipt" method="post">
        {products}
            <tr>
                <td>
                    <a href="sales/show/{id}">{name}</a>
                </td>
                <td>{description}</td>
                <td>{price}</td>                
                <td>{inStock}</td>
                <td>{promotion}</td>                
                <td><input name={id} type="number" min="0" max="50" step="1"></td>
            </tr>
        {/products}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>            
            <td><input class="btn btn-primary" type="submit" value="Place Order"><td>
        </tr>
    </form>
</table>
