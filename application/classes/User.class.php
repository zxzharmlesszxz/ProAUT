<?php

/***
* User class
***/

class User extends DatabaseObject{
 protected static $table_name = "users";
 protected static $db_fields = array(
				'userid', 'login', 'password', 'username',
				'email', 'uid', 'gid', 'homedir', 'shell', 'status'
				);

 protected $userid;
 protected $login;
 protected $password;
 protected $username;
 protected $email;
 protected $uid;
 protected $gid;
 protected $homedir;
 protected $shell;
 protected $status;

 final public function __get($key){
  return $this->$key;
 }

 public static function add(
			$login, $password, $username, $email, $homedir = NULL,
			$shell = NULL, $uid = NULL , $gid = NULL
			){
  //global $config;
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
//  $new->password = md5(trim($password));
  $new->username = trim($username);
  $new->email = trim($email);
  $new->uid = empty($uid) ? config()->DEFAULT_UID : intval(trim($uid));
  $new->gid = empty($gid) ? config()->DEFAULT_GID : intval(trim($gid));
  $new->homedir = empty($homedir) ? '/ftp/incoming/'.$new->login : trim($homedir);
  $new->shell = empty($shell) ? config()->DEFAULT_SHELL : trim($shell);
  $new->status = 0;
  return $new;
 }

 public function changeStatus(){
  $this->status = ($this->status == 1) ? 0 : 1;
  return $this->save();
 }

 public function setPassword($password){
  $this->password = '*'.strtoupper(sha1(sha1(trim($password), TRUE)));
 }
}
