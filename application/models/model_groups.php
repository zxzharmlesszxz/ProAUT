<?php

class Model_Groups extends Model{
 
 public function get_data(){
  return Group::find_all();
 }

 public function get($groupid){
  return Group::find_by_id($groupid);
 }

 public function save(Group $group){
  return $group->save() ? $group : false;
 }

 public function delete($groupid){
  return Group::find_by_id($groupid)->delete();
 }

 public function create($groupname, $gid = NULL){
  $group = Group::add($groupname, $gid);
  return $group->save() ? $group : false;
 }

 public function addMember($groupid, $member){
  $group = Group::find_by_id($groupid);
  $group->addMember(trim($_REQUEST['member']));
  return $group->save();
 }

 public function removeMember($groupid, $member){
  $group = Group::find_by_id($groupid);
  $group->delMember($member);
  return $group->save();
 }
}
