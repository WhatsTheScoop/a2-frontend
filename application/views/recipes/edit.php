<h1 class="text-center">{pagetitle}</h1>
<hr>

{if errors}
<div class="alert alert-danger">{errors}</div>
{/if}

<form action="{model}{id}{/model}" method='POST'>
    <div class="col-md-4 col-md-offset-4">
        {model}
        <div class="form-group row">
            <label for='id'>Recipe ID</label>
            <input type="number" name="id" value="{id}" class="form-control" />
        </div>

        <div class="form-group row">
            <label for='code'>Name</label>
            <input type="text" name="code" value="{code}" class="form-control" />
        </div>

        <div class="form-group row">
            <label for='description'>Type</label>
            <input type="text" name="description" value="{description}" class="form-control" />
        </div>

        <div class="form-group row">
            <label for='ingredients'>Ingredients</label>
            <input type="textbox" name="ingredients" value="{ingredients}" class="form-control" />
        </div>
        {/model}

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" onclick="location.href='{controller_url}'" class="btn btn-default">Return</button>
        </div>
    </div>
</form>