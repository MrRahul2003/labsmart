<?php
include '../../Partials/Connect.php'
?>
<?php
$sql = 'SELECT * FROM `test_database`';
$result = mysqli_query($conn,$sql) OR Die('query Failed');
if (mysqli_num_rows($result) > 0) {
$i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $database_id = $row['database_id'];
        $i++;
        echo
        '<tr>
            <td>'.$i.'</td>
            <td><a href="#" class="text-body">'.$row['database_name'].'</a></td>
            <td><span class="badge badge-soft-success mb-0">'.$row['database_shortname'].'</span></td>
            <td><a href="#" class="text-body">'.$row['database_category'].'</a></td>
            <td>
                <a href="ajax/Edit_Database.php?database_id='.$database_id.'" data-database_id='.$row['database_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
            <td>
                <a href="" data-database_id='.$row['database_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
            </td>
        </tr>';
    }

    mysqli_close($conn);

}

?>