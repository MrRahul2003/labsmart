<?php
include '../../Partials/Connect.php'
?>
<?php

$sql = "SELECT * FROM `sample_table`";
$result = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_result($result, $id, $user_id, 
$device_id, $device_cat, $device_name,
$status, $date_selected, $pymnt, $submit_on);
mysqli_stmt_execute($result);  
mysqli_stmt_store_result($result); // stores result

if (mysqli_stmt_num_rows($result)>0) {
$i = 0;
    while ($row = mysqli_stmt_fetch($result)) {
        $i++;
        echo
        '<tr>
            <td>'.$i.'</td>
            <td><span class="badge badge-soft-success mb-0">'.htmlentities($user_id,ENT_NOQUOTES,'UTF-8').'</span></td>
            <td><a href="#" class="text-body">'.htmlentities($device_cat,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($device_name,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($status,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($date_selected,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($submit_on,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td>
                <a href="" data-id='.$id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="View" class="px-2 text-danger" id="viewBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
            <td>
                <a href="" data-id='.$id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
            </td>
            <td>
            <a href="ajax/Edit_Database.php?id='.$id.'" data-id='.$id.' data-bs-toggle="tooltip" data-bs-placement="top"
                title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
        </td>
        </tr>';
    }

    mysqli_close($conn);

}

?>
 
