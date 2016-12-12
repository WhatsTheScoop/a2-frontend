<h1 class="text-center">{pagetitle}</h1>
<hr>

{if errors}
<div class="alert alert-danger">{errors}</div>
{/if}

<form method='POST'>
    <div class="col-md-4 col-md-offset-4">
        {model}
        <input type="hidden" name="id" value="0" class="form-control" />
    
        <div class="form-group row">
                <label for='recipeId'>Recipe ID</label>
                <input type="number" name="recipeId" value="{recipeId}" class="form-control" />
        </div>
    
        <div class="form-group row">
                <label for='price'>Price</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="number" step="0.01" name="price" value="{price}" class="form-control" />
                </div>
        </div>
    
        <div class="form-group row">
                <label for='inStock'>Stock</label>
                <input type="number" name="inStock" value="{inStock}" class="form-control" />
        </div>    
    
        <div class="form-group row">
                <label for='promotion'>Promotion</label>
                <input type="checkbox" name="promotion" value="{promotion}" class="form-check-input" />
        </div>    
        {/model}
    
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{controller_url}" class="btn btn-default">Return</a>        
        </div>
    </div>

</form>

