<h1>Product Details</h1>
<table class="table">
    <form action="/receiving/receipt" method="post">
        <tr>
            <th>Product ID</th>
            <td>{id}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{name}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{price}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{type}</td>
        </tr>
        <tr>
            <th>Per Box</th>
            <td>{perBox}</td>
        </tr>
        <tr>
            <th>In Stock</th>
            <td>{onHand}</td>
        </tr>
        <tr>
            <th>Quantity received:</th>
            <td><input name={id} type="number" min="0" max="50" step="1"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Receive Order"><td>
        </tr>
    </form>
</table>
<button class="btn btn-active" onclick="location.href='{backUrl}'">Return</button>
