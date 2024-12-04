<?php
include "template/header.php";
$sql = "SELECT username, role,last_login FROM user";
$result = $conn->query($sql);
?>
<div class="buttons">
    <a href="tambahuser.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
</div>
    <div class="table" >
    <!-- Tabel dengan kelas Bootstrap -->
    <table class="table table-striped table-bordered table-hover table-rounded mt-3">
        <thead class="table-secondary">
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Timestamp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['last_login']; ?></td>
                    <td align="center">
                    <a href="edituser.php?username=<?= $row["username"] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="deleteuser.php?username=<?= $row["username"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>