<?php

include_once '../../dbconfig.php';

if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $crud->delete($id);
    header("Location: http://" . $_SERVER[HTTP_HOST] . "/crud-php-pdo-bootstrap-mysql/templates/contact/delete.php?deleted");

}

?>
<?php include_once '../../header.php';?>

<div class="container">

	<?php
if (isset($_GET['deleted'])) {
    ?>
        <div class="alert alert-success">
    	Successfully Deleted
		</div>
        <?php
} else {
    ?>
        <div class="alert alert-danger">
        Are you sure?
		</div>
        <?php
}
?>
</div>

<div class="container">

	 <?php
if (isset($_GET['id'])) {
    ?>
         <table class='table table-bordered'>
         <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Date of birth</th>
         </tr>
         <?php
$stmt = $DB_con->prepare("SELECT * FROM tbl_contacts WHERE id=:id");
    $stmt->execute(array(":id" => $_GET['id']));
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        ?>
             <tr>
             <td><?php print($row['firstname']);?></td>
             <td><?php print($row['lastname']);?></td>
             <td><?php print($row['email']);?></td>
         	 <td><?php print($row['dob']);?></td>
             </tr>
             <?php
}
    ?>
         </table>
         <?php
}
?>
</div>

<div class="container">
<p>
<?php
if (isset($_GET['id'])) {
    ?>
  	<form method="post" action='<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Delete</button>
    <a href='<?="http://$_SERVER[HTTP_HOST]/crud-php-pdo-bootstrap-mysql/index.php"?>' class="btn btn-large btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Go back</a>
    </form>
	<?php
} else {
    ?>
    <a href=<?="http://$_SERVER[HTTP_HOST]/crud-php-pdo-bootstrap-mysql/index.php"?> class="btn btn-large btn-success" style="float: right;"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Go back</a>
    <?php
}
?>
</p>
</div>
<?php include_once '../../footer.php';?>