<h1>{pagetitle}</h1>
<hr>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <!--<th>ID</th>-->
        <th>Recipe ID</th>        
        <th>Price</th>
        <th>In Stock</th>
        <th>On promotion</th>        
        <!--<th></th>-->
    </thead>
    {transactions}
        <tr>
            <td>{id}</td>
            <td>{cost}</td>                
            <td>{productSold}</td>
            <td>{date}</td>             
        </tr>
    {/transactions}
</table>
<button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>

