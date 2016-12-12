    <h1>Our Recipes</h1>
    <table class="table" action="">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>In Stock</th>
            <th>Produce</th>
        </thead>
        <form action="production/receipt" method="POST">
            <tbody>
                {products}
                <tr>
                    <td>
                        <a href="/production/show/{productId}"
                        data-title="{name}">
                            {name}
                        </a>
                    </td>
                    <td>
                        {description}
                    </td>
                    <td>
                        {inStock}
                    </td>
                    <td><input name={productId} type="number" min="0" max="50" step="1"></td>
                </tr>
                {/products}
                 <tr>
                    <td><a href="{base_url}" class="btn btn-default">Return</a></td>
                    <td></td>
                    <td></td>
                    <td><input class="btn btn-primary" type="submit" value="Produce"><td>
                </tr>
            </tbody>
        </form>
    </table>
