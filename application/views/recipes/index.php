<h1>{pagetitle}</h1>
<button onclick="location.href='{controller_url}/create'" class="btn btn-primary">Create</button>
<hr>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <th>ID</th>
        <th>Name</th>        
        <th>Description</th>
        <th>Ingredients</th>
        <th></th>
    </thead>
    {models}
        <tr>
            <td>
                <a href="/RecipesController/details/{id}">{id}</a>
            </td>
            <td>{code}</td>
            <td>{description}</td>                
            <td>
            {ingredients}
                {name} x {quantity} <br>
            {/ingredients}
            </td>
            <td>
                <a href="/RecipesController/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
                <a href="/RecipesController/edit/{id}"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="/RecipesController/delete/{id}"><span class="glyphicon glyphicon-trash"></span></a>         
            </td>                
        </tr>
    {/models}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
