<?php

include_once '../../dbconfig.php';
if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    if ($crud->create($firstname, $lastname, $email, $dob)) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "templates/contact/add.php?inserted");
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "templates/contact/add.php?failure");
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
	<form method='post' action="<?=$_SERVER['HTTP_REFERER'] . 'templates/contact/add.php'?>">
    <table class='table table-bordered'>
        <tr>
            <td>First name</td><td><input type='text' name='firstname' class='form-control' required></td>
        </tr>
        <tr>
            <td>Last name</td><td><input type='text' name='lastname' class='form-control' required></td>
        </tr>
        <tr>
            <td>Email</td><td><input type='text' name='email' class='form-control' required></td>
        </tr>
        <tr>
            <td>Date of birth</td><td><input type='date' name='dob' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="save">
    		<span class="glyphicon glyphicon-plus"></span> Save</button>
            <a href="<?=$_SERVER['HTTP_REFERER']?>index.php" class="btn btn-large btn-success" style="float: right;">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once '../../footer.php';?>