<?php
include 'include/header.php';
include_once '../include/functions.php';
$userId = $_SESSION["sid"];
$accounts = getUserAccounts($userId);
?>

<form class="form-signin" method="post" action="../include/depositproc.php">
    <h3>Deposit Funds</h3>
    <label for="inputEmail" class="sr-only">Select Account</label>

    <select class="form-control mb-2" name = "accountId">
        <?php
        foreach ($accounts as $acc) {
            $number = $acc["account_number"];
            $id = $acc["id"];
            echo "<option value={$id}>{$number}</option>";
        }
        ?>
    </select>

    <label for="inputPassword" class="sr-only">Amount</label>
    <input type="text" id="amount" name ="amount" class="form-control" placeholder="Amount" required>
    <button class="btn btn-md btn-success btn-block" type="submit" name="submit">Deposit</button>
</form>

<?php
if (isset($_GET['s'])) {
    $s = $_GET['s'];
    switch ($s) {
        case 'lessBalance':
            echo '<script type="text/javascript" language="javascript">
          swal("Failed", "There is not so much balance in the world accout", "error");</script>';
            break;
        case 'success':
            echo '<script type="text/javascript" language="javascript">
          swal("Success", "Amount Deposit Successfully.", "success");</script>';
            break;
    }
}
?>
<?php include 'include/footer.php' ?>   