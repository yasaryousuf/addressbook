<?php

include_once '../../dbconfig.php';
if (isset($_POST['save'])) {
    $contact_id = $_POST['contact_id'];
    $number = $_POST['number'];
    if ($phone->create($contact_id, $number)) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/crud-php-pdo-bootstrap-mysql/templates/phone/add.php?inserted');
    } else {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . '/crud-php-pdo-bootstrap-mysql/templates/phone/add.php?failure');
    }}
?>
<?php include_once '../../header.php';?>
<?php
if (isset($_GET['inserted'])) {
    ?>
    <div class="container">
	   <div class="alert alert-info">
        Successfully inserted
	   </div>
	</div>
    <?php
} else if (isset($_GET['failure'])) {
    ?>
    <div class="container">
	   <div class="alert alert-warning">
        Something went wrong
	   </div>
	</div>
    <?php
}
?>

<div class="container">
	<form method='post' action="<?='http://' . $_SERVER['HTTP_HOST'] . '/crud-php-pdo-bootstrap-mysql/templates/phone/add.php'?>">
    <table class='table table-bordered'>
        <input type='hidden' name='contact_id' class='form-control' value="<?=$_GET['contact_id']?>"></td>

        <tr>
            <td>Number</td><td><input type='text' name='number' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="save">
    		<span class="glyphicon glyphicon-plus"></span> Save</button>
            <a href=<?="http://$_SERVER[HTTP_HOST]/crud-php-pdo-bootstrap-mysql/templates/phone/index.php?contact_id=$_GET[contact_id]"?> class="btn btn-large btn-success" style="float: right;">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once '../../footer.php';?>