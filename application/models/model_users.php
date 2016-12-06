<?php

class Model_Users extends Model {
 
 public function get_data() {
  $users = new Collection;
  foreach (User::find_all() as $user) {
   $users->addItem($user, $user->login);
  }
  return $users;
 }

 public function get($userid) {
  return User::find_by_id($userid);
 }

 public function save(User $user){
  return $user->save() ? $user : false;
 }
 
 public function changeStatus($userid) {
  return $user = $this->get_user($userid)->changeStatus();
 }

 public function create(array $user) {
  $user = User::add($user['login'], $user['password'], $user['username'], $user['email'], $user['homedir'], $user['shell'], $user['uid'], $user['gid']);
  return $user->save() ? $user : false;
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
  return $u->save() ? $u : false;
 }
}
