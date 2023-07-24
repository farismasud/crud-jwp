<!DOCTYPE html>
<html>
<head>
    <title>Halaman Komentar</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Daftar Users Registered</h1>
            <div>
                <a href="homepage.php" class="btn btn-danger my-5">Back</a>
                <a href="logout.php" class="btn btn-primary my-5">Logout</a>
            </div>
        </div>
        <?php
        // Simulasi komentar dari database atau sumber data lainnya
        $comments = array(
            array('id' => 1, 'nama' => 'John Doe', 'komentar' => 'Ini adalah komentar pertama.'),
            array('id' => 2, 'nama' => 'Jane Smith', 'komentar' => 'Komentar kedua dari pengguna lain.'),
            // Tambahkan komentar lainnya di sini
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission untuk menambah komentar baru
            $newComment = array(
                'id' => count($comments) + 1,
                'nama' => $_POST['name'],
                'komentar' => $_POST['comment'],
            );
            $comments[] = $newComment;
        }

        foreach ($comments as $comment) {
            echo '
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">' . $comment['nama'] . '</h5>
                    <p class="card-text">' . $comment['komentar'] . '</p>
                    <a href="edit_comment.php?id=' . $comment['id'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete_comment.php?id=' . $comment['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>';
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-4">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="comment">Komentar:</label>
                <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
