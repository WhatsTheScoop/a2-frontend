<?php
/**
 * @author: Spencer
 * Date: 10/2/2016
 * Time: 3:10 PM
 */
?>
<h1> Ingredients for {code}</h1>

    {description}
    <br/>
<table class="table">
    <form action="/production/receipt" method="post">
        <thead>
        <td><b>Name</b></td>
        <td><b>Servings Required</b></td>
        </thead>
        {ingredients}
        <tr>
            <td>{name}</td>
            <td>{inStock}</td>
            <td style="color:red"><b>{oos}</b></td>
        </tr>
        {/ingredients}
        <tr>
            <th>Quantity produced:</th>
            <td><input name="{id}" type="number" min="0" max="50" step="1"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Create Products"><td>
        </tr>
    </form>
</table>
<button class="btn btn-active" onclick="location.href='{backUrl}'">Return</button>



