<?php
include 'include/header.php';
include_once '../include/functions.php';

$accountId = $_GET['id'];
$accounts = getAccountTransactions($accountId);
?>

<h3>Transactions</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Account #</th>
            <th scope="col">Account Type</th>
            <th scope="col">Balance</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sr = 0;
        foreach ($accounts as $acc) {
            $sr++;
            $id = $acc["id"];
            $number = $acc["account_number"];
            $type = $acc["account_type"];
            $balance = $acc["balance"];
            echo "<tr>";
            echo "<td>{$sr}</td>
      <td>{$number}</td>
      <td>{$type}</td>
          <td>{$balance}</td>
              <td><a href='transactions.php?id={$id}'>Details              <td><a href='transactions.php?id={$id}'>Details</a></td>
</a></td>
          </tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'include/footer.php' ?>       