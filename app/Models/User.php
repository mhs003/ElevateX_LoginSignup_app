<?php
use Module\Model;

class User extends Model
{
    function __construct()
    {
        $this->connect();
    }

    public function create($name, $email, $pass, $token)
    {
        $query = sprintf("INSERT INTO users (name, email, pass, token) VALUES ('%s', '%s', '%s', '%s')", $this->db->real_escape_string($name), $this->db->real_escape_string($email), $this->db->real_escape_string($this->enc($pass)), $this->db->real_escape_string($token));
        $result = $this->db->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExists($email)
    {
        $query = sprintf("SELECT * from users WHERE email='%s'", $this->db->real_escape_string($email));
        $result = $this->db->query($query);
        return $result->num_rows === 0 ? false : true;
    }

    public function checkByEmailPass($email, $pass)
    {
        $query = sprintf("SELECT * from users WHERE email='%s' AND pass='%s'", $this->db->real_escape_string($email), $this->db->real_escape_string($this->enc($pass)));
        $result = $this->db->query($query);
        return $result->num_rows === 0 ? false : true;
    }

    public function updateToken($email, $token) {
        $query = sprintf("UPDATE users SET token='%s' WHERE email='%s'", $this->db->real_escape_string($email), $this->db->real_escape_string($token));
        $result = $this->db->query($query);
        return $result ? true : false;
    }

    public function getByToken($token)
    {
        $query = sprintf("SELECT * FROM users WHERE token='%s'", $this->db->real_escape_string($token));
        $result = $this->db->query($query);
        return $result->num_rows === 0 ? false : $result->fetch_assoc();
    }

    private function enc($pass)
    {
        return sha1('asvjeu7he8vg8934gh' . $pass . 'vneiurfhn84tv3yntv');
    }
}