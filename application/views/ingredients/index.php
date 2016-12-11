<h1>{pagetitle}</h1>
<h3>You're viewing data from our warehouse</h3>
<button onclick="location.href='http://a2backend.local'" class="btn btn-primary">Warehouse</button>
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
                <a href="/IngredientsController/details/{id}">{id}</a>
            </td>
            <td>{name}</td>
            <td>{price}</td>                
            <td>{type}</td>
            <td>{perBox}</td>
            <td>{onHand}</td>            
            <td>
                <a href="/IngredientsController/details/{id}"><span class="glyphicon glyphicon-search"></span></button></a>
            </td>                
        </tr>
    {/models}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
