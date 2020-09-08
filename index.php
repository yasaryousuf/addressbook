<?php include_once 'dbconfig.php';?>
<?php include_once 'header.php';?>

<div class="container">

</div>
<br />
<div class="container">
	<table class='table table-bordered'>
        <tr>
            <th>First name</th>
            <th>Last name </th>
            <th>Email</th>
            <th>
                <a href="templates/contact/add.php" class="btn btn-large btn-info">
                    <i class="glyphicon glyphicon-plus"></i> Add new
                </a>
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
$crud->dataview("SELECT * FROM tbl_contacts");
?>
    </table>
</div>
<?php include_once 'footer.php';?>