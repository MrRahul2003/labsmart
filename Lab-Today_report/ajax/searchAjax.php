<?php
include '../../Partials/Connect.php';
?>

<?php
$search_filter = $_POST['search_filter'];
$date_filter = $_POST['date_filter'];

$sql = "SELECT * FROM `patient` WHERE 
fname LIKE '%$search_filter%' || lname LIKE '%$search_filter%'
|| gender='$search_filter' || p_date='$date_filter'";
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
else
echo
'<tr>
    <td>'.htmlentities("NO Record found",ENT_NOQUOTES,'UTF-8').'</td>
</tr>';
?>