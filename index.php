<?php
require 'helpers.php';

$conn = getConnection();
// genrate the input form:
$tableName = isset($_GET['table_name']) ? $_GET['table_name'] : 'Student';

$columns = getColumns($conn, $tableName);

include __DIR__ . '/views/create.php';

include __DIR__ . '/views/delete.php';

include __DIR__ . '/views/showAllRecords.php';
