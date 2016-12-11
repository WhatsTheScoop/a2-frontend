<h1>{pagetitle}</h1>
<button onclick="location.href='{controller_url}/create'" class="btn btn-primary">Create</button>
<hr>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <th>ID</th>
        <th>Name</th>        
        <th>Price</th>
        <th>Type</th>
        <th>Per Box</th>        
        <th>In Stock</th>
        <th></th>
    </thead>
    {models}
        <tr>
            <td>
                <a href="IngredientsController/details/{id}">{id}</a>
            </td>
            <td>{name}</td>
            <td>{price}</td>                
            <td>{type}</td>
            <td>{perBox}</td>
            <td>{onHand}</td>            
            <td>
                <a href="IngredientsController/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
                <a href="IngredientsController/edit/{id}"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="IngredientsController/delete/{id}"><span class="glyphicon glyphicon-trash"></span></a>         
            </td>                
        </tr>
    {/models}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
