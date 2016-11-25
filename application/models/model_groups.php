<?php

class Model_Groups extends Model{
 
 public function get_data(){
  return Group::find_all();
 }

 public function get_group($groupid){
  return Group::find_by_id($groupid);
 }

 public function save_group(Group $group){
  $group->save();
  return $group;
 }

 public function delete_group($groupid){
  return Group::find_by_id($groupid)->delete();
 }

 public function create_group($groupname, $gid = NULL){
  $group = Group::add($groupname, $gid);
  $group->save();
  return $group;
 }

 public function addMember_group($groupid, $member){
  $group = Group::find_by_id($groupid);
  $group->addMember(trim($_REQUEST['member']));
  return $group->save();
 }

 public function deleteMember_group($groupid, $member){
  $group = Group::find_by_id($groupid);
  $group->delMember($member);
  return $group->save();
 }
}
