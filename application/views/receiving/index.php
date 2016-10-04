<h1> Welcome To Receiving</h1>

<!--Still need an action here for form submission-->
<table class="table" action="">
    <thead>    
        <td><b>Name</b></td>
        <td><b>Price</b></td>
        <td><b>Quantity per</b></td>
        <td><b>Ordered</b></td>
    </thead>
    <form>
        {supplies}
            <tr>
                <td>
                    <a href="receiving/details/{id}">{name}</a> 
                </td>
                <td>{price}</td>
                <td>{quantity}</td>
                <td><input name={name} type="number" min="0" max="50" step="1"></td>
            </tr>
        {/supplies}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="Receive Order"><td>
        </tr>
    </form>
</table>
