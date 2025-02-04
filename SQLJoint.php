<?php
include 'db_connect.php';


/*
$sql = "SELECT 
            p.alumni_id, p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        INNER JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id"; 
*/ // INNER JOIN - Retrieves only matching records

/*
$sql = "SELECT 
            p.alumni_id, p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        LEFT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id"; 
*/ // LEFT JOIN - Retrieves all records from alumni_personal_information and matching ones from alumni_secondary_information

/*
$sql = "SELECT 
            p.alumni_id, p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        RIGHT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id"; 
*/ // RIGHT JOIN - Retrieves all records from alumni_secondary_information and matching ones from alumni_personal_information

/*
$sql = "SELECT 
            p.alumni_id, p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        LEFT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id
        UNION
        SELECT 
            p.alumni_id, p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        RIGHT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id"; 
*/ // FULL OUTER JOIN (Simulated in MySQL using UNION as MySQL does not support FULL OUTER JOIN)

/*
$sql = "SELECT 
            p.firstname, p.lastname, s.collegedepartment, s.yeargraduated, s.workstatus
        FROM alumni_personal_information p
        CROSS JOIN alumni_secondary_information s"; 
*/// CROSS JOIN - Returns all possible combinations of rows

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Check if alumni_id exists before printing
            $alumni_id = isset($row["alumni_id"]) ? $row["alumni_id"] : "N/A";
    
            echo "ID: " . $alumni_id . 
                 " - Name: " . $row["firstname"] . " " . $row["lastname"] .
                 " - Department: " . $row["collegedepartment"] . 
                 " - Year Graduated: " . $row["yeargraduated"] . 
                 " - Work Status: " . $row["workstatus"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
