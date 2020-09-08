<?php

class crud
{
    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function create($firstname, $lastname, $email, $dob)
    {
        try
        {
            $stmt = $this->db->prepare(
                "INSERT INTO tbl_contacts(firstname,lastname,email,dob)
						VALUES(:firstname, :lastname, :email, :dob)");
            $stmt->bindparam(":firstname", $firstname);
            $stmt->bindparam(":lastname", $lastname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":dob", $dob);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tbl_contacts WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }

    public function update($id, $firstname, $lastname, $email, $contact)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE tbl_contacts SET firstname=:firstname,
		                                               lastname=:lastname,
													   email=:email,
													   dob=:dob
													WHERE id=:id ");
            $stmt->bindparam(":firstname", $firstname);
            $stmt->bindparam(":lastname", $lastname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":dob", $dob);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tbl_contacts WHERE id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }

    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                	<td><?php print($row['firstname']);?></td>
                	<td><?php print($row['lastname']);?></td>
                	<td><?php print($row['email']);?></td>
                	<td align="center">
                        <a href="templates/contact/edit.php?id=<?php print($row['id']);?>">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                	</td>
                	<td align="center">
                        <a href="templates/contact/delete.php?id=<?php print($row['id']);?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                	</td>
                    <td><a href="">Address List</a></td>
                    <td><a href="templates/phone/index.php?contact_id=<?php print($row['id']);?>">Phone List</a></td>
                    <td><a href="">Detail</a></td>
                </tr>
                <?php
}
        } else {
            ?>
            <tr>
            <td>No data found...</td>
            </tr>
            <?php
}
    }
}
?>