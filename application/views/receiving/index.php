<h1> Welcome To Receiving</h1>

<!--Still need an action here for form submission-->
<table class="table" action="">
    <thead>    
        <th>Name</th>
        <th>Price</th>
        <th>Per Box</th>
        <th>In Stock</th>
        <th>Ordered</th>
    </thead>
    <form>
        {supplies}
            <tr>
                <td>
                    <a href="receiving/details/{id}">{name}</a> 
                </td>
                <td>{price}</td>
                <td>{perBox}</td>
                <td>{onHand}</td>
                <td><input name={name} type="number" min="0" max="50" step="1"></td>
            </tr>
        {/supplies}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Receive Order"><td>
        </tr>
    </form>
</table>
