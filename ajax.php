<?php

//Including Database configuration file.

include "config.php";

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.

   $Name = $_POST['search'];

//Search query.

   $Query = "SELECT * FROM products WHERE product_name LIKE '%$Name%' ";

//Query execution

   $ExecQuery = MySQLi_query($conn, $Query);

//Creating unordered list to display result.

   echo '

<ul>

   ';

   //Fetching result from database.

   while ($Result = MySQLi_fetch_array($ExecQuery)) {

       ?>

   <!-- Creating unordered list items.

        Calling javascript function named as "fill" found in "script.js" file.

        By passing fetched result as parameter. -->

   <button onclick="window.location.href='product-details.php?pid=<?php echo $Result['id'];?>'"><?php echo $Result['product_name']; ?></button>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->

   <?php

}}


?>

</ul>