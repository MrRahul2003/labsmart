<?php
include '../../Partials/Connect.php'
?>
<?php
$sql = 'SELECT * FROM `test_panel`';
$result = mysqli_query($conn,$sql) OR Die('query Failed');
if (mysqli_num_rows($result) > 0) {
$i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $panel_id = $row['panel_id'];
        $i++;
        echo
        '<tr>
            <td>'.$i.'</td>
            <td><a href="#" class="text-body">'.$row['panel_name'].'</a></td>
            <td><span class="badge badge-soft-success mb-0">'.$row['panel_category'].'</span></td>
            <td><a href="#" class="text-body">'.$row['panel_tests'].'</a></td>
            <td><a href="#" class="text-body">'.$row['panel_name'].'</a></td>
            <td>
                <a href="ajax/Edit_panel.php?panel_id='.$panel_id.'" data-panel_id='.$row['panel_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>
            <td>
                <a href="" data-panel_id='.$row['panel_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
            </td>
            <td>
            <a href="ajax/View_Panel.php?panel_id='.$panel_id.'" data-panel_id='.$row['panel_id'].' data-bs-toggle="tooltip" data-bs-placement="top"
                title="View" class="px-2 text-primary" id="viewBtn"><i class="bx bx-pencil font-size-18"></i></a>
            </td>           
        </tr>';
    }

    mysqli_close($conn);

}

?>