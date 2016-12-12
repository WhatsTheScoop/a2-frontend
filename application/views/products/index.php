<h1>{pagetitle}</h1>
<button onclick="location.href='{controller_url}/create'" class="btn btn-primary">Create</button>
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
                <a href="/ProductsController/details/{id}">{id}</a>
            </td>
            <td>{recipeId}</td>
            <td>{price}</td>                
            <td>{inStock}</td>
            <td>{promotion}</td>
            <td>
                <a href="/ProductsController/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
                <a href="/ProductsController/edit/{id}"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="/ProductsController/delete/{id}"><span class="glyphicon glyphicon-trash"></span></a>         
            </td>                
        </tr>
    {/products}
</table>
<a href="/Admin" class="btn btn-default">Return</a>
