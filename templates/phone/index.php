<?php include_once '../../dbconfig.php';?>
<?php include_once '../../header.php';?>
<?php
if (isset($_GET['contact_id'])) {
    $contact_id = $_GET['contact_id'];
    extract($crud->getID($contact_id));

}
?>

<div class="container">

</div>
<br />
<div class="container">
    <h1> <?="$firstname $lastname"?>'s Phones</h1>
	<table class='table table-bordered'>
        <tr>
            <th>Phone</th>
            <th>
                <a href="<?='http://' . $_SERVER['HTTP_HOST'] . '/crud-php-pdo-bootstrap-mysql/templates/phone/add.php?contact_id=' . $_GET['contact_id']?>" class="btn btn-large btn-info">
                    <i class="glyphicon glyphicon-plus"></i> Add new
                </a>
            </th>
            <th></th>
        </tr>
        <?php
$phone->dataview("SELECT * FROM tbl_phones");
?>
    </table>
</div>
<?php include_once '../../footer.php';?>