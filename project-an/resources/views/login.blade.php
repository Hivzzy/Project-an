<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: #f9eed8;
            backdrop-filter: blur(20px);
        }

        .row {
            background: white;
            border-radius: 30px;
        }

        img {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .btn1 {
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn1:hover {
            background-color: white;
            border: 1px solid;
            color: black
        }
    </style>
</head>

<body>
    <section style="
    display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="image/logo_perusahaan.jpg" class="img-fluid " alt="Unsplash">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Welcome</h1>
                    <h4 class="col-lg-7">Login</h4>
                    <form method="post" action="/user/login">
                        @csrf
                        <div class="row no-gutters col-lg-7">
                            <input id="username" name="username" class="form-control my-4 p-2" type="text"
                                name="" placeholder="Username">
                        </div>
                        <div class="row no-gutters col-lg-7">
                            <input id="password" name="password" class="form-control mb-4 p-2" type="password"
                                name="" placeholder="******">
                        </div>
                        @error('username')
                            <div id="error" class="row no-gutters col-lg-7">{{ $message }}</div>
                        @enderror
                        <div class="col-lg-7">
                            <button class="btn1 mt-3 mb-5 " type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
