<h1>{pagetitle}</h1>
<hr>
<table class="table table-striped table-bordered" action="">
    <thead>    
        <!--<th>ID</th>-->
        <th>id</th>        
        <th>amount</th>
        <th>description</th>
        <th>date</th>        
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
<button onclick="location.href='{base_url}admin'" class="btn btn-default">Return</button>

