<?php
include '../../Partials/Connect.php'
?>
<?php

$sql = "SELECT * FROM `patient`";
$result = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_result($result, $p_id, $title, 
$fname, $lname, $aadhar, $email, $mobile, $years, $months, $p_days, 
$p_address, $report, $gender, $p_date, $curr_time);
mysqli_stmt_execute($result);  // stores result
mysqli_stmt_store_result($result);

if (mysqli_stmt_num_rows($result)>0) {
$i = 0;
    while ($row = mysqli_stmt_fetch($result)) {
        $i++;
        echo
        '<tr>
            <td>'.htmlentities($p_id,ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities($p_date,ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities($curr_time,ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities($fname,ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Dr.satish singh",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5100",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5095",ENT_NOQUOTES,'UTF-8').'</td>
            <td>'.htmlentities("Rs.5",ENT_NOQUOTES,'UTF-8').'</td>
            <td><span success mb-0">'.htmlentities($report,ENT_NOQUOTES,'UTF-8').'</span></td>
            <td>
                <a href="ajax/Edit_Database.php?p_id='.$p_id.'" data-p_id='.$p_id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
        </tr>';
    }

    mysqli_close($conn);

}

?>
 
