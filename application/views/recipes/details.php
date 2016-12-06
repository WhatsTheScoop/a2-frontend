<h1 class="text-center">{pagetitle}</h1>
<hr>

<div class="col-md-4 col-md-offset-4">
    {model}
    <dl class="dl-horizontal">
        <dt>Recipe ID</dt>
        <dd>{id}</dd>
            
        <dt>Name</dt>
        <dd>{code}</dd>
        
        <dt>Description</dt>
        <dd>{description}</dd>

        <dt>Ingredients</dt>
        <dd>{ingredients}</dd>
    </dl> 
    {/model}       
    <div class="text-center">
        <a href="{controller_url}/edit/{model}{id}{/model}" class="btn btn-primary">Edit</a>
        <a href="{controller_url}" class="btn btn-default">Return</a>     
    </div>
</div>  
   