<h1>Product Details</h1>

<form action="/sales/receipt" method="post">
    <table class="table">
        <input type="hidden" name='id' value={id}>
        <tr>     
            <th>Product ID</th>
            <td>{id}</td>
        </tr>
        <tr>
            <th>Recipe ID</th>
            <td>{recipeId}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{name}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{description}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{price}</td>
        </tr>
        <tr>
            <th>inStock</th>
            <td>{inStock}</td>
        </tr>
        <tr>
            <th>On Promotion</th>
            <td>{promotion}</td>
        </tr>
        <tr>
            <th>Place Order:</th>
            <td><input name={id} type="number" min="0" max="50" step="1"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Receive Order"><td>
        </tr>
    </table>
</form>
<button onclick="location.href='{backUrl}'">Return</button>
