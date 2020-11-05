<?php
session_start();
require_once('SQL/conn.php');
if(isset($_POST['view'])) {
    $sql    = 'SELECT * FROM infomation';
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1">';
        echo '<tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Permission</th>
                <th colspan=2>Control</th>
              </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['nameuser'].'</td>
                      <td>'.$row['phone'].'</td>';
                if($row['permission'] == 1) {
                    echo '<td>Admin</td>';
                } else {
                    echo '<td>Member</td>';
                } 
                echo '<td><button >Edit</button></td>
                      <td><button >Delete</button></td>';
                echo '</tr>';
        }
    }
}
