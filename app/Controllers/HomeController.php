<?php
class HomeController
{
    public function main($req, $res)
    {
        $token = Cookie::get('token');
        $udata = [];
        if ($token) {
            $user = new User();
            $udata = $user->getByToken($token);
            if (!$udata) {
                redirect('/logout');
            }
            $user->disconnect();
        } else {
            redirect('/login');
        }
        $res->send(render('home', ['token' => $token, 'user' => $udata]));
    }
}