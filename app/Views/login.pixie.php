<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="@css_link(styles_logsign)">
    <link href="@favicon@" rel="shortcut icon" />
</head>

<body>
    <div class="form-container">
        <div class="form-header">Log in</div>
        @if($error)
        @{!{ "<div class=\"alert error\">$error</div>" }}
        @endif
        <form action="link_for(/login)" method="post">
            <div class="form-ip">
                <label for="email"></label><input class="ip-text" type="email" name="email" id="email">
            </div>
            <div class="form-ip">
                <label for="password"></label><input class="ip-text" type="password" name="password" id="password"><span
                    class="toggle-eye" id="sh"></span>
            </div>
            <div class="form-ip">
                <input type="submit" value="Login">
            </div>
            <div class="form-footer">
                <a href="#" class="flink">Forget password</a>|<a href="link_for(/signup)" class="flink">Create an account</a>
            </div>
        </form>
    </div>
    <script src="@js_src(pjs)"></script>
    <script src="@js_src(logsign)"></script>
</body>

</html>
