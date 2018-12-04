<?php
// I feel like all of this needs to be moved to the index.php file. //

$category_id_esc = $dbName->escape_string($category_id);

$query = "SELECT * FROM vegas
          WHERE categoryID = '$category_id_esc'";
$result = $dbName->query($query);

if ($result == false) {
    $errorMessage = $dbName->error; 
    echo "<p>An error occurred: $errorMessage</p>";
    exit();
}



$row_count = $result->num_rows;



?>

<?php for ($i = 0; $i < $row_count; $i++) :
        $vegas = $result->fetch_assoc();
?>
<tr>
    <td><?php echo $casino['casinoID']; ?></td>
</tr>
<?php endfor; ?>
