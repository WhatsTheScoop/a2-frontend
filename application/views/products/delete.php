<h1>{pagetitle}</h1>
<h3>Are you sure you want to delete this?</h3>
<hr>
{model}
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
{/model}
<a href="{controller_url}/delete_confirmed/{model}{id}{/model}" class="btn btn-danger">Delete</a>
<a href="{controller_url}" class="btn btn-default">Return</a>       