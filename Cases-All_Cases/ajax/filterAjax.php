<?php
include '../../Partials/Connect.php';
?>
<?php
$regno = $_POST['regno'];
$patient_name = $_POST['patient_name'];
$referred_by = $_POST['referred_by'];
$case_type = $_POST['case_type'];
$collection_center = $_POST['collection_center'];
$case_from = $_POST['case_from'];
$case_to = $_POST['case_to'];

$sql = "SELECT * FROM `patient` WHERE curr_time='00:00:00'"; 

if ($regno != "") {
    $sql .= "OR p_id='$regno'";
}
if ($patient_name != "") {
    $sql .= "OR fname='$patient_name' OR lname='$patient_name' ";
}
if ($case_from != "NaN-NaN-NaN" && $case_to != "NaN-NaN-NaN") {
    $sql .= "OR p_date BETWEEN '$case_from' AND '$case_to' ";
}
// echo
// '<tr>
//     <td>'.$sql.'</td>
// </tr>';   
$result = mysqli_query($conn, $sql) or Die("sql query failed");

if (mysqli_num_rows($result)>0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo
        '<tr>
            <td>'.htmlentities($row['p_id'],ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities($row['p_date'],ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities($row['curr_time'],ENT_NOQUOTES,'UTF-8').'</td>
            <td>
            <p>'.htmlentities($row['fname'],ENT_NOQUOTES,'UTF-8').' '.htmlentities($row['lname'],ENT_NOQUOTES,'UTF-8').'</p>
            <p>'.htmlentities($row['mobile'],ENT_NOQUOTES,'UTF-8').'</p>
            </td>
            <td>'.htmlentities("Dr.satish singh",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5100",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5095",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5",ENT_NOQUOTES,'UTF-8').'</td>
            <td><span success mb-0">'.htmlentities($row['report'],ENT_NOQUOTES,'UTF-8').'</span></td>
            <td>
                <a href="ajax/Edit_Database.php?p_id='.$row['p_id'].'" data-p_id='.$row['p_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
        </tr>';
    }
}
else{
    echo
    '<tr>
        <td>'.htmlentities("NO Record found",ENT_NOQUOTES,'UTF-8').'</td>
    </tr>';   
}
?>