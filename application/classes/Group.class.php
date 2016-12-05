<?php

/**
* Group class
**/

class Group extends DatabaseObject{
 protected static $table_name = "groups";
 protected static $db_fields = array('groupid', 'groupname', 'gid', 'members');

 public $groupid;
 public $groupname;
 public $gid;
 public $members;

 public static function add($groupname, $gid = NULL){
  $new = new static;
  $new->groupname = trim($groupname);
  $new->gid = empty($gid) ? config()->DEFAULT_GID : intval(trim($gid));
  $new->members = NULL;
  return $new;
 }

 public function addMember($member){
  $members = (!empty($this->members) AND $this->members != 'NULL') ? explode(',', $this->members) : array();
  if(array_search($member, $members) === FALSE && !empty($member)){
    $members[] = $member;
  }
  $this->members = implode(',', $members);
 }

 public function delMember($member){
  $members = explode(',', $this->members);
  $key = array_search($member, $members);
  if($key !== FALSE){
    unset($members[$key]);
  }
  $this->members = implode(',', $members);
 }
}
