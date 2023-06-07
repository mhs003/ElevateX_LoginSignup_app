<?php
class SignupController
{
    public function _get($req, $res)
    {
        Cookie::isset('token') ? redirect('/') : false;
        $res->send(render('signup', ['errors' => []]));
    }

    public function _post($req, $res)
    {
        Cookie::isset('token') ? redirect('/') : false;
        $body = $req->body;
        $uname = $body['username'];
        $email = $body['email'];
        $pass1 = $body['password'];
        $pass2 = $body['password2'];
        $errors = [];
        if ($pass1 !== $pass2) {
            $errors[] = "Confirmation password didn't match.";
        } else if (strlen($pass1) < 8) {
            $errors[] = "Password should have atleast 8 characters.";
        }
        if (strlen($uname) < 5) {
            $errors[] = "Username should have atleast 5 characters.";
        }
        if (!preg_match('~^([a-z0-9\.\-_]+@[a-z0-9\.\-_]+\.\w+)$~', $email)) {
            $errors[] = "Your provided email address is not valid.";
        }

        if (empty($errors)) {
            $token = md5(time() . $email . time() . $pass1);
            $user = new User();
            if (!$user->checkEmailExists($email)) {
                if (!$user->create($uname, $email, $pass1, $token)) {
                    $errors[] = "Could not signup. Please try again later.";
                } else {
                    Cookie::set('token', $token);
                    redirect('/');
                }
            } else {
                $errors[] = "Email address already exists.";
            }
        }
        $user->disconnect();

        $res->send(render('signup', ['errors' => $errors]));
    }
}