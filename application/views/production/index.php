<div class="col-lg-4">
    <h1>Our Recipes</h1>
    <table class="table" action="">
        <form>
            {recipes}
            <tr>
                <td>
                    <a href="production/show/{id}"
                       data-title="{code}">
                        {code}
                    </a>
                </td>

            </tr>
            {/recipes}
        </form>
    </table>
    <button onclick="location.href='{base_url}/production/create'" class="btn btn-success">Create</button>
</div>