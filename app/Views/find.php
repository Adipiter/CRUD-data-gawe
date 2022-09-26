<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="jaranguda.com tutorial codeigniter4">
        <title>Kumpulan user</title>

        <!-- Bootstrap core CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    </head>
    <body>

        <main role="main" class="container-fluid">

            <h1>Menampilkan seluruh users</h1>
            <hr>

            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Info</th>
                </tr>

                <?php foreach ($data as $user):
                // var_dump($user);
                ?>
                <tr>
                    <td><?php echo $user['name_user']; ?></td>
                    <td><?php echo $user['email_user']; ?></td>
                    <td><?php echo $user['password_user']; ?></td>
                    <td><?php echo $user['info_user']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

        </main>
        <!-- /.container -->
    </body>
</html>