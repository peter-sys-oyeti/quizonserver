<?php

$db = new mysqli('localhost', 'username', 'password', 'database');
$query = $db->query('DESCRIBE `TBLUSERS`');
$fields = array();
while($row = $query->fetch_assoc()) {
    $fields[] = $row['Field'];
}

?>

<form id="generate-form" type="POST">
    <?php foreach($fields as $field): ?>
        <label>
            <?php echo "$field: "; ?>
            <input type="text" name="<?php echo $field; ?>" />
        </label><br/>
    <?php endforeach; ?>
    <input type="submit" name="submit" />
</form>