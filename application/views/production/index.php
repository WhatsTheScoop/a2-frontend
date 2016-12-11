<div class="col-lg-4">
    <h1>Our Recipes</h1>
    <table class="table" action="">
        <form>
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
            </tr>
            {/products}
        </form>
    </table>
    <button onclick="location.href='{base_url}'" class="btn btn-default">Return</button>
</div>