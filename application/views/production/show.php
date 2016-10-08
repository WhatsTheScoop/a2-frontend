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
</table>
<button onclick="location.href='{backUrl}'">Return</button>



