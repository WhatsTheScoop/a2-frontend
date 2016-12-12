<h1 class="text-center">{pagetitle}</h1>
<hr>
<div class="col-md-4 col-md-offset-4">
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
    <div class="text-center">
        <a href="{controller_url}/edit/{model}{id}{/model}" class="btn btn-primary">Edit</a>
        <a href="{controller_url}" class="btn btn-default">Return</a>
    </div>        
</div>