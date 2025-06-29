<?php include 'db_config_pg.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - PostgreSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container">
        <h2 class="mb-4">📥 Pesan Masuk dari Form Kontak (PostgreSQL)</h2>
        <table class="table table-bordered table-striped bg-white shadow">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $result = pg_query($conn, "SELECT * FROM contact_messages ORDER BY submitted_at DESC");
                while ($row = pg_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['subject']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                    <td><?= $row['submitted_at'] ?></td>
                </tr>
            <?php endwhile; pg_close($conn); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
