<?php

class Model_Quotalimits extends Model {

 public function get_data() {
  $quotalimits = new Collection;
  foreach (QuotaLimit::find_all() as $quotalimit) {
   $quotalimits->addItem($quotalimit, $quotalimit->quotalimitid);
  }
  return $quotalimits;
 }

 public function get(integer $quotalimitid) {
  return QuotaLimit::find_by_id($quotalimitid);
 }

 public function save(QuotaLimit $quotalimit) {
  $quotalimit->save();
  return $quotalimit;
 }

 public function delete(integer $quotalimitid) {
  return QuotaLimit::find_by_id($quotalimitid)->delete();
 }

 public function create(array $quotalimit) {
  $new = QuotaLimit::add($quotalimit['name'], $quotalimit['quota_type'], $quotalimit['per_session'], $quotalimit['limit_type'], $quotalimit['bytes_in_avail'], $quotalimit['bytes_out_avail'], $quotalimit['bytes_xfer_avail'], $quotalimit['files_in_avail'], $quotalimit['files_out_avail'], $quotalimit['files_xfer_avail']);
  var_dump($new);
  return $new->save() ? $new : NULL;
 }
}
