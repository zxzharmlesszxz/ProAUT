<?php

/*
User class
 */

class User extends DatabaseObject{
 protected static $table_name = "users";
 protected static $db_fields = array('userid', 'login', 'password', 'username', 'email', 'uid', 'gid', 'homedir', 'shell', 'status');

 private $userid;
 private $login;
 private $password;
 private $username;
 private $email;
 private $uid;
 private $gid;
 private $homedir;
 private $shell;
 private $status;

 public static function add($login, $password, $username, $email, $homedir = NULL, $shell = config()->DEFAULT_SHELL, $uid = config()->DEFAULT_GID , $gid = config()->DEFAULT_GID){
  //global $config;
  $new = new static;
  $new->login = trim($login);
  $new->setPassword($password);
//  $new->password = md5(trim($password));
  $new->username = trim($username);
  $new->email = trim($email);
  $new->uid = intval(trim($uid));
  $new->gid = intval(trim($gid));
  $new->homedir = empty($homedir) ? '/ftp/incoming/'.$new->login : trim($homedir);
  $new->shell = trim($shell);
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
