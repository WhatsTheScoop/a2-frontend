<h1>{pagetitle}</h1>
<button onclick="location.href='{base_url}/recipes/create'" class="btn btn-primary">Create</button>
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
                <a href="recipes/details/{id}">{id}</a>
            </td>
            <td>{code}</td>
            <td>{description}</td>                
            <td>
            {ingredients}
                {name} x {quantity} <br>
            {/ingredients}
            </td>
            <td>
                <a href="recipes/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
                <a href="recipes/edit/{id}"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="recipes/delete/{id}"><span class="glyphicon glyphicon-trash"></span></a>         
            </td>                
        </tr>
    {/models}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
