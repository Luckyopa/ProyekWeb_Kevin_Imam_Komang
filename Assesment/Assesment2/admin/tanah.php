<?php
include "template/header.php";
$sql = "SELECT * FROM tanah";
$result = $conn->query($sql);
?>
<div class="buttons">
    <a href="tambahtanah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
</div>
<div class="table">
    <!-- Tabel dengan kelas Bootstrap -->
    <table class="table table-striped table-bordered table-hover table-rounded mt-3">
        <thead class="table-secondary">
            <tr>
                <th>Judul</th>
                <th>luas</th>
                <th>Harga</th>
                <th>alamat</th>
                <th>sertifikat</th>
                <th>deskripsi</th>
                <th>foto</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['luas']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['sertifikat']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><img src="<?php echo $row['foto']; ?>" alt="Foto" width="100" height="100"></td>
                    <td align="center">
                        <a href="edittanah.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="deletetanah.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>

</html>