<!DOCTYPE html>
<html>
<head>
    <title>Hapus Komentar</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Hapus Komentar</h1>

        <?php
        // Simulasi komentar dari database atau sumber data lainnya
        $comments = array(
            array('id' => 1, 'nama' => 'John Doe', 'komentar' => 'Ini adalah komentar pertama.'),
            array('id' => 2, 'nama' => 'Jane Smith', 'komentar' => 'Komentar kedua dari pengguna lain.'),
            // Tambahkan komentar lainnya di sini
        );

        // Mendapatkan id komentar dari URL
        $commentId = $_GET['id'];

        // Cari komentar berdasarkan id
        $selectedCommentIndex = null;
        foreach ($comments as $index => $comment) {
            if ($comment['id'] == $commentId) {
                $selectedCommentIndex = $index;
                break;
            }
        }

        if ($selectedCommentIndex !== null) {
            $deletedComment = $comments[$selectedCommentIndex];

            // Hapus komentar dari array berdasarkan indeks
            array_splice($comments, $selectedCommentIndex, 1);

            // Simulasi proses penghapusan komentar dari database atau sumber data lainnya
            // ...

            echo '
            <div class="alert alert-success" role="alert">
                Komentar oleh ' . $deletedComment['nama'] . ' berhasil dihapus.
            </div>';
        } else {
            echo '
            <div class="alert alert-danger" role="alert">
                Komentar tidak ditemukan.
            </div>';
        }
        ?>

        <a href="comment.php" class="btn btn-primary mt-2">Kembali ke Halaman Komentar</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
