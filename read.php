<?php
    require('database.php');

    $sort = "DESC"; 
    $column = "id"; 
    if(isset($_GET['column']) && isset($_GET['sort'])){
        $sort = $_GET['sort'];
        $column = $_GET['column']; 

        $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
    }

    $queryAccounts = "SELECT * FROM accounts ORDER BY $column $sort"; 
    $sqlAccounts = mysqli_query($connection,$queryAccounts);
?>