<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>LOGIN ADMIN</title>
    <style>
    .container {
        width: 30%;
        margin-top: 9%;
        box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
        padding: 40px;
        color: white;
    }
    button {
        width: 48%;
    }
    body {
        background-color: blue;
    }
    </style>
  </head>
  <?php 
include 'konfigurasi/konfig.php';

if(isset($_POST['login'])){
  $nama=$_POST['nama'];
  $password=$_POST['password'];

  $password=($password);


  if(ceklogin($nama,$password)){
    echo "<script>window.location.href='halamanawal.php'</script>";
  }else{
    echo "<script>alert('Login Gagal')</script>";
  }
}
?>
  <body>
    <div class="container">
     <h4 class="text-center">LOGIN ADMIN</h4> 
     <hr>
     <form action="" method="POST">
      <div class="form-group" >
        <label>Username</label> <br>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Username Anda">
      </div><br>

      <div class="form-group">
        <label>Password</label> <br>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
      </div> <br>

      <button type="submit" class="btn btn-primary" name="login">SUBMIT</button>
      <button type="reset" class="btn btn-danger">RESET</button>
     </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    
</html>