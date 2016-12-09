<h1 class="text-center">{pagetitle}</h1>
<hr>

{if errors}
<div class="alert alert-danger">{errors}</div>
{/if}

<form action="{model}{id}{/model}" method='POST'>
    <div class="col-md-4 col-md-offset-4">
        {model}
        <div class="form-group row">
            <label for='id'>Ingredient ID</label>
            <input type="number" name="id" value="{id}" class="form-control" />
        </div>

        <div class="form-group row">
            <label for='name'>Name</label>
            <input type="text" name="name" value="{name}" class="form-control" />
        </div>

        <div class="form-group row">
            <label for='price'>Price</label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" step="0.01" name="price" value="{price}" class="form-control" />
            </div>
        </div>

        <div class="form-group row">
            <label for='type'>Type</label>
            <input type="text" name="type" value="{type}" class="form-control" />
        </div>

        <div class="form-group row">

            <label for='perBox'>Per Box</label>
            <input type="number" name="perBox" value="{perBox}" class="form-control" />
        </div>

        <div class="form-group row">

            <label for='onHand'>On Hand</label>
            <input type="number" name="onHand" value="{onHand}" class="form-control" />
        </div>
        {/model}

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" onclick="location.href='{controller_url}'" class="btn btn-default">Return</button>
        </div>
    </div>
</form>