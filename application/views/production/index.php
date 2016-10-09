<?php
/**
 * @author: Spencer
 * Date: 10/2/2016
 * Time: 2:52 PM
 */
?>

<!--Still need an action here for form submission-->
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
</div>