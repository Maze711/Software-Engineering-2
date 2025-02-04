<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .join-type {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Alumni Records</h2>
    
    <?php
        include 'db_connect.php';        

        $joinTypes = [

            // INNER JOIN - Retrieves only matching records
            "INNER JOIN" => [
                "query" => "SELECT p.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, s.collegedepartment, s.yeargraduated, s.workstatus 
                            FROM alumni_personal_information p 
                            INNER JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id",
                "columns" => ["alumni_id", "firstname", "lastname", "middlename", "suffix", "collegedepartment", "yeargraduated", "workstatus"]
            ],

             // LEFT JOIN - Retrieves all records from alumni_personal_information and matching ones from alumni_secondary_information     
            "LEFT JOIN" => [
                "query" => "SELECT s.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, p.gender, p.birthdate, p.email, p.address, p.number 
                            FROM alumni_personal_information p 
                            LEFT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id",
                "columns" => ["alumni_id", "firstname", "lastname", "middlename", "suffix", "gender", "birthdate", "email", "address", "number"]
            ],

            // RIGHT JOIN - Retrieves all records from alumni_secondary_information and matching ones from alumni_personal_information
            "RIGHT JOIN" => [
                "query" => "SELECT s.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, s.collegedepartment, s.yeargraduated, s.civilstatus, s.workstatus, s.job_title
                            FROM alumni_personal_information p 
                            RIGHT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id",
                "columns" => ["alumni_id", "firstname", "lastname", "middlename", "suffix", "collegedepartment", "yeargraduated", "civilstatus", "workstatus", "job_title"]
            ],

            // FULL OUTER JOIN (Simulated in MySQL using UNION as MySQL does not support FULL OUTER JOIN)
            "FULL OUTER JOIN (Simulated)" => [
                "query" => "SELECT p.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, p.gender, p.birthdate, p.email, p.address, p.number, 
                                    s.collegedepartment, s.yeargraduated, s.civilstatus, s.workstatus, s.job_title 
                            FROM alumni_personal_information p 
                            LEFT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id 
                            UNION 
                            SELECT p.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, p.gender, p.birthdate, p.email, p.address, p.number, 
                                    s.collegedepartment, s.yeargraduated, s.civilstatus, s.workstatus, s.job_title  
                            FROM alumni_personal_information p 
                            RIGHT JOIN alumni_secondary_information s ON p.alumni_id = s.alumni_id",
                "columns" => ["alumni_id", "firstname", "lastname", "middlename", "suffix", "gender", "birthdate", "email", "address", "number", 
                                "collegedepartment", "yeargraduated", "civilstatus", "workstatus", "job_title" 
                            ]
            ],

            // CROSS JOIN - Returns all possible combinations of rows 
            "CROSS JOIN" => [
                "query" => "SELECT p.alumni_id, p.firstname, p.lastname, p.middlename, p.suffix, s.collegedepartment, s.yeargraduated, s.workstatus 
                            FROM alumni_personal_information p 
                            CROSS JOIN alumni_secondary_information s",
                "columns" => ["alumni_id", "firstname", "lastname", "middlename", "collegedepartment", "yeargraduated", "workstatus"]
            ]
        ];
        
        $selectedJoin = $_GET['join'] ?? "INNER JOIN";
        $sql = $joinTypes[$selectedJoin]["query"];
        $columns = $joinTypes[$selectedJoin]["columns"];
    ?>

    <div class="join-type">Current Join Type: <?php echo $selectedJoin; ?></div>

    <form method="GET">
        <label for="join">Select Join Type: </label>
        <select name="join" id="join" onchange="this.form.submit()">
            <?php foreach ($joinTypes as $type => $data) { ?>
                <!-- iterates and Displays the Join Type in the dropdown-->
                <option value="<?php echo $type; ?>" <?php if ($selectedJoin == $type) echo 'selected'; ?>><?php echo $type; ?></option>
            <?php } ?>
        </select>
    </form>
    <br>
    <div style="overflow-x:auto;">    
        <table>
            <thead>
                <tr>
                    <?php 
                        foreach ($columns as $column) { 
                            // Displays the column in the table based on the retrieve quey columns
                            echo "<th>" . ucfirst(str_replace('_', ' ', $column)) . "</th>"; 
                        } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($columns as $column) {
                                // Iterates each column and display the data per row; placed N/A if none
                                $value = $row[$column] ?? "N/A";
                                echo "<td>" . htmlspecialchars($value) . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . count($columns) . "'>No records found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php $conn->close() ?>
</body>
</html>
