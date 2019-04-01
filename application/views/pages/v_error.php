<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title; ?></title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      box-sizing: border-box;
      height: 100vh;

    }
    .content {
      background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
      width: 100%;
    }
    .text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="text">
      <h1 style="color: #78175a; font-size: 70px; font-family: sans-serif; letter-spacing: 2px; font-weight: 700; margin-bottom: 0px;">404</h1>
      <h1 class="open ls-1" style="color: #78175a; font-family: 'Helvetica'; font-size: 40px; font-weight: 700; margin-top: 0px;">Maaf, Halaman Tidak Ditemukan!</h1>
      <p style="letter-spacing: 1px; font-size: 20px; text-transform: uppercase; margin-top: 2em; font-family: Helvetica;"> <a href="<?= base_url('home'); ?>"><< Back</a> </p>
    </div>
  </div>

</body>
</html>
