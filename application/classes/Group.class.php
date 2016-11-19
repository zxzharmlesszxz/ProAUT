<?php

/*
Group class
 */

class Group extends DatabaseObject{
 protected static $table_name = "groups";
 protected static $db_fields = array('groupid', 'groupname', 'gid');

 private $groupid;
 private $groupname;
 private $gid;

 public static function add($groupname, $gid = config()->DEFAULT_GID){
  $new = new static;
  $new->groupname = trim($groupname);
  $new->gid = intval(trim($gid));
  return $new;
 }
}
