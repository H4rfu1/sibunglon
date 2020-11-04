<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SiBunglon</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">

        <div id="register" class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
            @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Nama" required />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="ulangi password" required />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="{{url('login')}}" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
