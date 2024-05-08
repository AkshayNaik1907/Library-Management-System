<?php
        include("data.php");


        $search_book = $_GET["search_book"];
        $u=new data;
        $u->setconnection();
        $u = "SELECT * FROM book WHERE book_name LIKE '%$search_book%'";


        if ($u->num_rows > 0) {
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo "<div class='result-box'>";
                echo "<h3>" . $row['book_name'] . "</h3>";
                echo "<p>Author: " . $row['author'] . "</p>";
                echo "<p>Available Copies: " . $row['book_available'] . "</p>";
                echo "<p>Rack: " . $row['Rack'] . "</p>";
                echo "<p>Sub Rack: " . $row['Sub_Rack'] . "</p>";
                echo "</div>";
            }
        } else {
            // No results found
            echo "No matching books found.";
        }
        




    ?> 