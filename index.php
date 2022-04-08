<html>
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

<h1 class="my-5">Student Registration</h1>

<a href="add.php" class="btn btn-info">Add Student</a>
<br><br>
<table class="table table-bordered table-striped">
 <tbody>
    <tr>
       <th>Student ID</th>
       <th>Name</th>
       <th>Majors</th>
       <th>Gender</th>
       <th>Address</th>
       <th>Action</th>
    </tr>
    <?php
    include 'config/db_config.php';
    $a=mysqli_query($conn,"SELECT * FROM college_student");
    foreach ($a as $b)
    {
    ?>
    <tr>
       <td><?= $b['student_id']; ?></td>
       <td><?= $b['name']; ?></td>
       <td><?= $b['majors']; ?></td>
       <td><?= $b['gender']; ?></td>
       <td><?= $b['address']; ?></td>
       <td>
            <a href="update.php?student_id=<?= $b['student_id']; ?>"><b><i>Edit</i></b></a> | 
            <a href="index.php?student_id=<?= $b['student_id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>
<br><br>

<a href="contact/helpdesk.php" class="btn btn-secondary">Send form to helpdesk</a>

</body>
</html>

<?php
if(isset($_GET['student_id']))
{
    $student_id=$_GET['student_id'];
    $sql="DELETE FROM college_student WHERE student_id='$student_id'";
    if($conn->query($sql) === false)
    { 
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } 
    else 
    { 
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>