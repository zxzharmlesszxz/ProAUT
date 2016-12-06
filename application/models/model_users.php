<?php

class Model_Users extends Model {
 
 public function get_data() {
  #return User::find_all();
  $users = new Collection;
  foreach (User::find_all() as $user) {
   $users->addItem($user, $user->login);
  }
  return $users;
 }

 public function get_user($userid) {
  return User::find_by_id($userid);
 }

 public function changeStatus($userid) {
  return $user = $this->get_user($userid)->changeStatus();
 }

 public function add(array $user) {
  $user = User::add($user['login'], $user['password'], $user['username'], $user['email'], $user['homedir'], $user['shell'], $user['uid'], $user['gid']);
  $user->save();
  return $user;
 }

 public function delete($userid) {
  return User::find_by_id($userid)->delete();
 }

 public function update(array $user) {
  foreach ($user as $key => $value) {
   $user[$key] = trim($value);
  }
  if (($user['password'] == $user['repassword']) && !empty($user['password'])) {
   unset($user['repassword']);
  } else {
   unset($user['password']);
   unset($user['repassword']);
  }
  $u = User::find_by_scope(array('login' => $user['login']))[0];
  if (!$u) {
   return FALSE;
  }
  foreach ($user as $key => $value) {
   $u->$key = $value;
   if ($key == 'password') {
    $u->setPassword($u->password);
   }
  }
  $u->save();
  return $u;
 }
}
