<?php

class Model_Groups extends Model{
 
 public function get_data(){
  $groups = new Collection;
  foreach (Group::find_all() as $group) {
   $groups->addItem($group, $group->groupid);
  }
  return $groups;
 }

 public function get($groupid){
  return $this->get_data()->getItem($groupid);
 }

 public function save(Group $group){
  return $group->save() ? $group : false;
 }

 public function delete($groupid){
  return $this->get_data()->getItem($groupid)->delete();
 }

 public function create($groupname, $gid = NULL){
  $group = Group::add($groupname, $gid);
  return $group->save() ? $group : false;
 }

 public function addMember($groupid, $member){
  $group = $this->get_data()->getItem($groupid);
  $group->addMember(trim($member));
  return $group->save();
 }

 public function removeMember($groupid, $member){
  $group = $this->get_data()->getItem($groupid);
  $group->delMember($member);
  return $group->save();
 }
}
