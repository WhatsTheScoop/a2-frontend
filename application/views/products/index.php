<h1>{pagetitle}</h1>
<button onclick="location.href='{base_url}/products/create'" class="btn btn-primary">Create</button>
<hr>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <th>ID</th>
        <th>Recipe ID</th>        
        <th>Price</th>
        <th>In Stock</th>
        <th>On promotion</th>        
        <th></th>
    </thead>
    {products}
        <tr>
            <td>
                <a href="Products/details/{id}">{id}</a>
            </td>
            <td>{recipeId}</td>
            <td>{price}</td>                
            <td>{inStock}</td>
            <td>{promotion}</td>
            <td>
                <a href="products/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
                <a href="products/edit/{id}"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="products/delete/{id}"><span class="glyphicon glyphicon-trash"></span></a>         
            </td>                
        </tr>
    {/products}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
