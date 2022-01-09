<!DOCTYPE html>
<html lang="en">
<head>
    @toastr_css
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="chatViews/chats.css">
    <title>Home Page</title>
</head>
<body>
    <br>
<br>
<div class="cont">
    <form action="{{ Route('clientLogin') }}" method="post">
        @csrf
        <div class="form sign-in">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input name="email" type="email" />
            </label>
            <label>
                <span>Password</span>
                <input name="password" type="password" />
            </label>
            <div class="col-12 mt-3">
                <button id="loginAccount" type="btn" class="submit">Login</button>
            </div>
        </div>
    </form>
    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h3>Don't have an account? Please Register!<h3>
            </div>
            <div class="img__text m--in">

                <h3>If you already has an account, just Login.<h3>
            </div>
            <div class="img__btn">
                <span class="m--up">Register</span>
                <span class="m--in">Login</span>
            </div>
        </div>
       <form action="{{ Route('clientRegister') }}" method="post">
        @csrf
        <div class="form sign-up">
            <h2>Create your Account</h2>
            <label>
                <span>Full Name</span>
                <input name="fullname" type="text" />
            </label>
            <label>
                <span>Phone Number</span>
                <input name="phonenumber" type="text" />
            </label>
            <label>
                <span>Email</span>
                <input name="email" type="email" />
            </label>
            <label>
                <span>Password</span>
                <input name="password" type="password" />
            </label>
            <div class="col-12 mt-3">
                <button id="registerAccuont" type="btn" class="submit">Register</button>
            </div>
        </div>
       </form>
    </div>
</div>

<script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>
<script>
@jquery
@toastr_js
@toastr_render
</script>
</body>
</html>