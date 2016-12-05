<h1>{pagetitle}</h1>
<hr>

{if errors}
<div class="alert alert-danger">{errors}</div>
{/if}

<form action="edit_validate" method='POST'>

    <div class="form-group row">
        <div class="col-md-4">
            <label for='id'>Product ID</label>
            <input type="number" name="id" value="{id}" class="form-control" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <label for='recipeId'>Recipe ID</label>
            <input type="number" name="recipeId" value="{recipeId}" class="form-control" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <label for='price'>Price</label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" step="0.01" name="price" value="{price}" class="form-control" />
            </div>
        </div>        
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <label for='inStock'>Stock</label>
            <input type="number" name="inStock" value="{inStock}" class="form-control" />
        </div>
    </div>    

    <div class="form-group row">
        <div class="col-md-4">
            <label for='promotion'>Promotion</label>
            <input type="checkbox" name="promotion" value="{promotion}" class="form-check-input" />
        </div>
    </div>    

    <div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" onclick="location.href='{controller_url}'" class="btn btn-default">Return</button>    
    </div>

</form>

