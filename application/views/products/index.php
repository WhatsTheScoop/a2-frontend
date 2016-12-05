<h1>{pagetitle}</h1>
<hr>
<button onclick="location.href='{base_url}/products/create'" class="btn btn-primary">Create</button>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <th>ID</th>
        <th>Recipe ID</th>        
        <th>Price</th>
        <th>In Stock</th>
        <th>On promotion</th>        
    </thead>
    {if yes}HELLO{/if}
    {products}
        <tr>
            <td>
                <a href="Products/details/{id}">{id}</a>
            </td>
            <td>{recipeId}</td>
            <td>{price}</td>                
            <td>{inStock}</td>
            <td>{promotion}</td>                
        </tr>
    {/products}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
