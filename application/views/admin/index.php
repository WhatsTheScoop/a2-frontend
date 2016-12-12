<div id="body" class="text-center">
    <h1>Admin Page</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/Admin/">Overview</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/Admin/Dashboard">Dashboard</a></li>
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
