<!DOCTYPE html>
<html>
<head>
    <title>Edit Komentar</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Komentar</h1>

        <?php
        // Simulasi komentar dari database atau sumber data lainnya
        $comments = array(
            array('id' => 1, 'nama' => 'John Doe', 'komentar' => 'Ini adalah komentar pertama.'),
            array('id' => 2, 'nama' => 'Jane Smith', 'komentar' => 'Komentar kedua dari pengguna lain.'),
            // Tambahkan komentar lainnya di sini
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = $_POST['id'];
            $updatedComment = $_POST['comment'];

            // Simulasi proses update komentar ke database atau sumber data lainnya
            foreach ($comments as &$comment) {
                if ($comment['id'] == $commentId) {
                    $comment['komentar'] = $updatedComment;
                    break;
                }
            }

            // Redirect kembali ke halaman utama setelah update berhasil
            header('Location: comment.php');
            exit;
        }

        // Mendapatkan id komentar dari URL
        $commentId = $_GET['id'];

        // Cari komentar berdasarkan id
        $selectedComment = null;
        foreach ($comments as $comment) {
            if ($comment['id'] == $commentId) {
                $selectedComment = $comment;
                break;
            }
        }

        if ($selectedComment) {
            echo '
            <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                <input type="hidden" name="id" value="' . $selectedComment['id'] . '">
                <div class="form-group">
                    <label for="comment">Edit Komentar:</label>
                    <textarea name="comment" id="comment" rows="4" class="form-control" required>' . $selectedComment['komentar'] . '</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>';
        } else {
            echo '<p>Komentar tidak ditemukan.</p>';
        }
        ?>

        <a href="comment.php" class="btn btn-secondary mt-2">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
