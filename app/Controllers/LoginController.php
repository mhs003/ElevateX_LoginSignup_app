<?php
class LoginController
{
    public function _get($req, $res)
    {
        Cookie::isset('token') ? redirect('/') : false;
        $res->send(render('login', ['error' => false]));
    }
    
    public function _post($req, $res)
    {
        Cookie::isset('token') ? redirect('/') : false;
        $body = $req->body;
        $email = $body['email'];
        $pass = $body['password'];
        $error = "";
        $user = new User();
        if ($user->checkByEmailPass($email, $pass)) {
            $token = md5(time() . $email . time() . $pass);
            if ($user->updateToken($token, $email)) {
                Cookie::set('token', $token);
                redirect('/');
            } else {
                $error = "Something went wrong. Please try again later.";
            }
        } else {
            $error = "Email/Password does not match!";
        }
        $user->disconnect();
        $res->send(render('login', ['error' => $error]));
    }
}