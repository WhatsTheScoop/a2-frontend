<h1 class="text-center">{pagetitle}</h1>
<hr> 

{if errors}
<div class="alert alert-danger">{errors}</div>
{/if}

<form method='POST'>
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

        <input type="hidden" name="ingredients" value=""/>

        <div class="form-group row">
            <label for='ingredient_name[]' class="ingredient-header">Ingredients</label>
<div id="ingredients-container">
                <table>
                    <tr>
                        <td class="ingredient-name-col">Name</td>
                        <td class="ingredient-quantity-col">Quantity</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ingredient_name[]" value="" class="form-control ingredient-name-input" /></td>
                        <td><input type="number" name="ingredient_quantity[]" value="" class="form-control ingredient-quantity-input" /></td>
                    </tr>
                    <tr id="ingredient-insertion-point"></tr>
                </table>
                <div class="text-center">
                    <button id="ingredient-add-button" type="button" class="btn btn-success btn-circle">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
</div>
            <!--
            <input type="text" name="ingredient_name[]" value="" class="form-control ingredient-name-input" />
            <input type="number" name="ingredient_quantity[]" value="" class="form-control ingredient-quantity-input" />
            -->
        </div>
        {/model}

        <div>
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="button" onclick="location.href='{controller_url}'" class="btn btn-default">Return</button>
        </div>
    </div>
</form>

<script>
$("#ingredient-add-button").click(function() {
    var ingredientDom = `
    <tr>
        <td><input type="text" name="ingredient_name[]" value="" class="form-control ingredient-name-input" /></td>
        <td><input type="number" name="ingredient_quantity[]" value="" class="form-control ingredient-quantity-input" /></td>
    </tr>`;
    $("#ingredient-insertion-point").before(ingredientDom);
});
</script>

<style>
#ingredients-container {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding-bottom: 10px;
}
table { 
    border-spacing: 10px;
    border-collapse: separate;
}
.ingredient-header {
    display: block;
}
.ingredient-name-col {
    width: 70%;
}
.ingredient-quantity-col {
    width: 25%;
}
 
/*
.ingredient-name-input {
    float: left;
    width: 70%;
}
.ingredient-quantity-input {
    float: right;    
    width: 20%;
}*/
</style>