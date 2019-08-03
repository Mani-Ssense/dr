<?php
if (!empty($_POST) && isset($_POST['__delete'])) {
	deleteFromTable($conn, $tableName, $_POST['pk_name'], $_POST['pk_value']);
}

$result = getAllRecords($conn, $tableName);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table>";
	echo '<tr>';
	foreach ($columns as $column) {
		echo "<th>$column</th>";
	}
	echo "<th>delete</th>";
	echo '</tr>';
    while($row = $result->fetch_assoc()) {
		echo '<tr>';
		foreach ($row as $k => $v) {
			echo "<td>";
			echo "<input type=\"text\" name=\"{$k}\" value=\"$v\">";
			echo "</td>";
		}
		echo '<form action="" method="post">';
		echo '<input type="hidden" name="__delete" value="">';
		echo '<input type="hidden" name="pk_name" value="'. $pk .'">';
		echo '<input type="hidden" name="pk_value" value="'. $row[$pk] .'">';
		echo "<td><input type=\"submit\" value=\"Delete\"></td>";
		echo '</form>';
		echo '</tr>';
    }
	echo "</table>";

} else {
    echo "0 results";
}
