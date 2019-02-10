<?php
include 'db.php';
$maskCode = $_POST["mask-code"];
$filterCode = $_POST["filter-code"];
if ($maskCode != "") {
    $results = $c->query("SELECT * FROM lifetime WHERE mask_id='" . $maskCode . "'");
    if ($results && $results->num_rows > 0) {
        $status = [];
        while ($row = $results->fetch_assoc()) {
            array_push($status, $row);
        }
        echo json_encode($status);
    } else {
        echo -1;
    }
} else if ($filterCode != "") {
    $results = $c->query("SELECT * FROM lifetime WHERE filter_id='" . $filterCode . "'");
    if ($results && $results->num_rows > 0) {
        $status = [];
        while ($row = $results->fetch_assoc()) {
            array_push($status, $row);
        }
        echo json_encode($status);
    } else {
        echo -1;
    }
}