<?php
include '../../Partials/Connect.php'
?>
<?php 
    $sql = "SELECT * FROM `test_categories`";
    $result = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_result($result, $login_user_id, $category_id, 
    $category_name, $category_edited_name, $category_shortname, $category_date, $category_time);
    mysqli_stmt_execute($result);  // stores result
    mysqli_stmt_store_result($result);
    
    if (mysqli_stmt_num_rows($result)>0) {
        $i = 0;
        // echo '<tr><td>'.mysqli_stmt_num_rows($result).'</td></tr>';
        while ($row = mysqli_stmt_fetch($result)) 
        {
            $i++;
            echo
            '<tr>
                <td>'.$i.'</td>
                <td><a href="#" class="text-body">'.htmlentities($category_edited_name,ENT_NOQUOTES,'UTF-8').'</a></td>
                <td><span class="badge badge-soft-success mb-0">'.htmlentities($category_shortname,ENT_NOQUOTES,'UTF-8').'</span></td>

                <td>
                <a href="ajax/Edit_Category.php?category_id='.$category_id.'" data-category_id='.$category_id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Edit" class="px-2 text-primary" id="editBtn"><i class="bx bx-pencil font-size-18"></i></a>
                </td>
                <td>
                <a href="" data-category_id='.$category_id.' data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete" class="px-2 text-danger" id="deleteBtn"><i class="bx bx-trash-alt font-size-18"></i></a>
                </td>
            </tr>';
        }
        mysqli_stmt_free_result($result);
        mysqli_stmt_close($result);
        mysqli_close($result);
    }
?>