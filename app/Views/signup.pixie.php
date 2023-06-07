<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="@css_link(styles_logsign)">
    <link href="@favicon@" rel="shortcut icon" />
</head>

<body>
    <div class="form-container">
        <div class="form-header">Sign up</div>
        @if($errors)
        <div class="alert error">@{{ implode('<br>', $errors) }}</div>
        @endif
        <form action="link_for(/signup)" method="post">
            <div class="form-ip">
                <label for="username"></label><input class="ip-text" type="text" name="username" id="username">
            </div>
            <div class="form-ip">
                <label for="email"></label><input class="ip-text" type="email" name="email" id="email">
            </div>
            <div class="form-ip">
                <label for="password"></label><input class="ip-text" type="password" name="password" id="password"><span
                    class="toggle-eye" id="sh"></span>
            </div>
            <div class="form-ip">
                <label for="password2"></label><input class="ip-text" type="password" name="password2" id="password2"><span
                    class="toggle-eye" id="sh2"></span>
            </div>
            <div class="form-ip">
                <input type="submit" value="Signup">
            </div>
            <div class="form-footer">
                <a href="link_for(/login)" class="flink">Signin to an existing account</a>
            </div>
        </form>
    </div>
    <script src="@js_src(pjs)"></script>
    <script src="@js_src(logsign)"></script>
</body>

</html>
