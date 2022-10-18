<?php
include '../../Partials/Connect.php'
?>
<?php

$sql = "SELECT * FROM `payment_history`";
$result = mysqli_prepare($conn,$sql);
mysqli_stmt_bind_result($result, $user_id, 
$repair_Id, $dvc_name,
$paid_on, $status, $pymnt, $SrNo, $paymnt_id, );
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
            <td><a href="#" class="text-body">'.htmlentities($dvc_name,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($paid_on,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($paymnt_id,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($status,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td><a href="#" class="text-body">'.htmlentities($pymnt,ENT_NOQUOTES,'UTF-8').'</a></td>
            <td>
                <a href="" data-id='.$repair_Id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
            </td>
            <td>
            <a href="ajax/Edit_Database.php?id='.$repair_Id.'" data-repair_Id='.$repair_Id.' data-bs-toggle="tooltip" data-bs-placement="top"
                title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
        </td>
        </tr>';
    }

    mysqli_close($conn);

}

?>
 
