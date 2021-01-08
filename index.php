<?php
    require('read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud Tutorial</title>
</head>
<style>
  html, body {
    margin: 0;
    padding: 0;
  }
  .main {
    height: 100vh;

    /* Grid */
    display: grid;
    grid-template-rows: auto auto 1fr;
    justify-items: center;
    row-gap: 20px;
    
  }
  .main .create-main {
    grid-row: 1/2;
    display: grid;
    grid-auto-rows: auto;
    row-gap: 5px;
  }
  .main .create-main h3 {
    text-align: center;
  }
  .main .export-main {
    grid-row: 2/3;
  }
  .main .read-main {
    grid-row: 3/4;
  }
  .main .read-main tr th {
    width: 200px;
  }
  .main .read-main tr td {
    text-align: center;
  }
  .main .read-main tr td:nth-child(4) {
    display: grid;
    grid-auto-flow: column;
  }
</style>
<body>
    <div class="main">
    <form class="create-main" action="create.php" method="post">
        <h1>CREATE USER</h1>
        <input type="text" name="username"  placeholder="Enter your name" required/>
        <input type="password" name="password"  placeholder="Enter your password" required/>
        <input type="submit" name="create" value="CREATE" />
    </form>

    <table class = "read-main">
        <tr>
            <th><a href="?column=id&sort=<?php echo $sort?>">ID</a></th>
            <th><a href="?column=username&sort=<?php echo $sort?>">USERNAME</a></th>
            <th><a href="?column=password&sort=<?php echo $sort?>">PASSWORD</a></th>
            <th>ACTIONS</th>
        </tr>
        <?php while($results = mysqli_fetch_array($sqlAccounts)){ ?>
        <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['username']; ?></td>
            <td><?php echo $results['password']; ?></td>
            <td>
                <form action="update.php" method="post">
                    <input type="submit" value="EDIT" name="edit">
                    <input type="hidden" value="<?php echo $results['id'];?>" name="editId">
                    <input type="hidden" value="<?php echo $results['username'];?>" name="editUsername">
                    <input type="hidden" value="<?php echo $results['password'];?>" name="editPassword">
                </form>
                <form action="delete.php" method="post">
                    <input type="submit" value="DELETE" name="delete">
                    <input type="hidden" value="<?php echo $results['id'];?>" name="deleteId">
                </form>
            </td>
        </tr>
        <?php }  ?>
    </table>

    </div>
</body>
</html>