<div id="body" class="text-center">
    <h1>Admin Page</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/Admin/">Dasbhoard</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/Admin/Transactions">Transactions</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/IngredientsController">Ingredients</a></li>
                <li><a href="/RecipesController">Recipes</a></li>
                <li><a href="/ProductsController">Products</a></li>
            </ul>
        </div>
    </nav>

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
            <th>Cost of Sales Ingredients consumed</th>
            <td>{costofingredientsused}</td>
        </tr>

    </form>
</table>
    <br>
    
        
</div>
