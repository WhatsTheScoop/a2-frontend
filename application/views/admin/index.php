<div id="body" class="text-center">
    <h1>Admin Page</h1>
    <button onclick="location.href='{controller_url}/dashboard'" class="btn btn-primary">transactions</button>
    <br><br>
    <table class="table">
    <form action="">
        <tr>
            <th>Amount spent purchasing inventory</th>
            <td>{inventorycost}</td>
        </tr>
        <tr>
            <th>Amount received from sales</th>
            <td>{salesamount}</td>
        </tr>
        <tr>
            <th>Net profit</th>
            <td>{netprofit}</td>
        </tr>
        <tr>
            <th>Number of sales to date</th>
            <td>{numberofsales}</td>
        </tr>
    </form>
</table>
    <br>
    
        
</div>
