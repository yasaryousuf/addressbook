<?php

class Phone
{
    private $db;

    public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function create($contact_id, $number)
    {
        try
        {
            $stmt = $this->db->prepare(
                "INSERT INTO tbl_phones(contact_id,number)
						VALUES(:contact_id, :number)");
            $stmt->bindparam(":contact_id", $contact_id);
            $stmt->bindparam(":number", $number);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tbl_phones WHERE id=:id");
        $stmt->execute(array(":id" => $id));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }

    public function update($id, $contact_id, $number)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE tbl_phones SET contact_id=:contact_id,
		                                               number=:number
													WHERE id=:id ");
            $stmt->bindparam(":contact_id", $contact_id);
            $stmt->bindparam(":number", $number);
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
        $stmt = $this->db->prepare("DELETE FROM tbl_phones WHERE id=:id");
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
                	<td><?php print($row['number']);?></td>
                	<td align="center">
                        <a href="templates/phone/edit.php?id=<?php print($row['id']);?>">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                	</td>
                	<td align="center">
                        <a href="templates/phone/delete.php?id=<?php print($row['id']);?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                	</td>

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