<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public/css/style.css">
  <title>Your One And Only Gym</title>
</head>

<body>
  <div class="page-container">
    <div class="page-content">
      <nav class="navbar navbar-expand-lg navbar-light bg-c">
        <div class="container">
          <a class="navbar-brand text-dark" href="/">Lemon<strong>Gym</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link text-dark" href="/feedback">Feedback</a>
            </div>
            <div class="navbar-nav ml-auto">
              <a class="nav-link text-dark" href="/login">Login</a>
              <a class="nav-link text-dark" href="/register">Register</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="topImage"></div>

      <div class="container">
        {{content}}
      </div>
      
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219426156724!2d25.3356966160162!3d54.72335507837753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010224!5e0!3m2!1sen!2slt!4v1614672592134!5m2!1sen!2slt" width="100%" height="300" style="border:0;" class="map" allowfullscreen="" loading="fast"></iframe>
    <footer class=" text-center text-lg-start">
      <div class="text-center p-3" >
        © 2021 <a class="text-dark" href="https://www.linkedin.com/in/edmundas-gataveckas-69148816a/">Edmundas Gataveckas</a>, all rights reserved.
      </div>
    </footer>

  </div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>