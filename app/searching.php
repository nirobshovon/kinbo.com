<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['ItemToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `product` WHERE `title` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `product`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "kinbo.com");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <form  method="post">


            <table>
                <tr>
                    <th>title</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>stock</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['title'];?></td>
                    <td> <img  src="image\'.$row['img_path'].'" height="20" /></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['stock'];?></td>
					<td><h3><a href="cart.php?pid='.$row['id'].'" >Add to cart</a></h3></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

    </body>
</html>
