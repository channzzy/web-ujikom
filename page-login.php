<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section id="page-login" class="px-4 d-flex justify-content-center alaign-items-center" style="height: 70vh; margin-top:3rem; margin-left:5rem;">
        <div class="container-fluid">
            <div class="card" style="width: 70rem;">
            <div class="bg-danger rounded-top-2">
            <?php
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert text-white ms-2'>Akun yang anda masukan salah</div>";
                }
            }
            ?>
            </div>
                <div class="card-body d-flex justify-content-center align-content-center">
                    <div class="left">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_yubjrwy7/doctors.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
                    </div>
                    <div class="right" style="margin-top: 4rem; margin-left:2rem;">
                    <form action="login.php" method="post">
                        <h4 class="mb-5">Silahkan Login</h4>
                        <input type="text" name="username" style="width: 25rem; height:3rem;" placeholder="Masukan Username" class="form-control mb-3 rounded-5">
                        <input type="password" name="password" style="width: 25rem; height:3rem;" placeholder="Masukan Password" class="form-control mb-3 rounded-5">
                        <button type="submit" class="btn rounded-5 text-white mb-3" style="background-color: var(--primary); width:25rem;height:3rem;">Login</button>
                        <a href="index.html" class="btn rounded-5 text-white" style="background-color: var(--primary); width:25rem; height:3rem; padding-top:1rem;">Kembali</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</html>