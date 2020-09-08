<?php

include_once '../../dbconfig.php';
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    if ($crud->update($id, $firstname, $lastname, $email, $dob)) {
        $msg = "<div class='alert alert-info'>
				Edit success
				</div>";
    } else {
        $msg = "<div class='alert alert-warning'>
				Edit error
                </div>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    extract($crud->getID($id));
}
?>

<?php include_once '../../header.php';?>
<div class="container">
<?php
if (isset($msg)) {
    echo $msg;
}

?>
</div>
<div class="container">
    <form method='post' action='<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'>
    <table class='table table-bordered'>
        <tr>
            <td>First name</td>
            <td><input type='text' name='firstname' class='form-control' value="<?php echo $firstname; ?>" required></td>
        </tr>

        <tr>
            <td>Last name</td>
            <td><input type='text' name='lastname' class='form-control' value="<?php echo $lastname; ?>" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' value="<?php echo $email; ?>" required></td>
        </tr>

        <tr>
            <td>Date of birth</td>
            <td><input type='date' name='dob' class='form-control' value="<?php echo date('Y-m-d', strtotime($dob)); ?>" required></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="update">
    			<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
				</button>
                <a href="<?="http://$_SERVER[HTTP_HOST]/crud-php-pdo-bootstrap-mysql/index.php"?>"  class="btn btn-large btn-success" style="float: right;"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once '../../footer.php';?>