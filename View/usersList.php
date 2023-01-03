<div class="container">
    <h2 class="center">List of users</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Admin</th>
            </tr>
        </thead>
        <tbody>
<?php  
    $count = 0;
    foreach ($usersList as $user) {
        $count++;
        echo '<tr>';
            echo '<th scope="row">'.$count.'</th>';
            echo '<td>' . $user["email"] . '</td>';
            echo '<td>' . $user["password"] . '</td>';
            echo '<td>' . $user["firstName"] . '</td>';
            echo '<td>' . $user["lastName"] . '</td>';
            echo '<td>' . $user["admin"] . '</td>';
        echo '</tr>';
    }
?>
        </tbody>
    </table>
</div>