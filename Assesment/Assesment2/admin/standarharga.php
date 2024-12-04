<?php
include "template/header.php";
$sql = "SELECT kecamatan.id_kecamatan,nama_kota,nama_kecamatan,njop FROM kota join kecamatan on kota.id_kota = kecamatan.id_kota join standar_harga on kecamatan.id_kecamatan = standar_harga.id_kecamatan" ;
$result = $conn->query($sql);
?>
<div class="buttons">
    <a href="tambahstandar.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
</div>
    <div class="table" >
    <!-- Tabel dengan kelas Bootstrap -->
    <table class="table table-striped table-bordered table-hover table-rounded mt-3">
        <thead class="table-secondary">
            <tr>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>NJOP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nama_kota']; ?></td>
                    <td><?php echo $row['nama_kecamatan']; ?></td>
                    <td><?php echo $row['njop']; ?></td>
                    <td align="center">
                    <a href="editstandar.php?id_kecamatan=<?= $row["id_kecamatan"] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="deletestandar.php?id_kecamatan=<?= $row["id_kecamatan"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>