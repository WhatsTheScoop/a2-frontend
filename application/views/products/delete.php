<h1>{pagetitle}</h1>
<h3>Are you sure you want to delete this?</h3>
<hr>
<dl class="dl-horizontal">
    <dt>Product ID</dt>
    <dd>{id}</dd>
        
    <dt>Recipe ID</dt>
    <dd>{recipeId}</dd>

    <dt>Price</dt>
    <dd>{price}</dd>

    <dt>Stock</dt>
    <dd>{inStock}</dd>

    <dt>Promotion</dt>
    <dd>{promotion}</dd>
</dl>  
<button onclick="location.href='{controller_url}/delete_confirmed/{id}'" class="btn btn-danger">Delete</button>
<button onclick="location.href='{controller_url}'" class="btn btn-default">Return</button>