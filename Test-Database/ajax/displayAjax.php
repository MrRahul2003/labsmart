<?php
include '../../Partials/Connect.php'
?>
<?php

$sql = "SELECT * FROM `test_database`";
$result = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_result($result, $login_user_id, $database_id, 
$database_name, $database_shortname, $database_category,
$database_unit,$database_input_type, $database_date, $database_time);
mysqli_stmt_execute($result);  // stores result
mysqli_stmt_store_result($result);

if (mysqli_stmt_num_rows($result)>0) {
$i = 0;
    while ($row = mysqli_stmt_fetch($result)) {
        $i++;
        echo
        '<tr>
            <td>'.$i.'</td>
            <td><a href="#" class="text-body">'.htmlentities($database_name,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><span class="badge badge-soft-success mb-0">'.htmlentities($database_shortname,ENT_NOQUOTES,'UTF-8').'</span></td>
            <td><a href="#" class="text-body">'.htmlentities($database_category,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td>
                <a href="ajax/Edit_Database.php?database_id='.$database_id.'" data-database_id='.$database_id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
            <td>
                <a href="" data-database_id='.$database_id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
            </td>
        </tr>';
    }

    mysqli_close($conn);

}

?>
 
