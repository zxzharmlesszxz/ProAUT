<?php

class Model_Quotalimits extends Model {

 public function get_data() {
  $quotalimits = new Collection;
  foreach (QuotaLimit::find_all() as $quotalimit) {
   $quotalimits->addItem($quotalimit, $quotalimit->quotalimitid);
  }
  return $quotalimits;
 }

 public function get($quotalimitid) {
  return $this->get_data->getItem($quotalimitid);
 }

 public function save(QuotaLimit $quotalimit) {
  return $quotalimit->save() ? $quotalimit : false;
 }

 public function delete($quotalimitid) {
  return $this->get_data->getItem($quotalimitid)->delete();
 }

 public function create(array $quotalimit) {
  $new = QuotaLimit::add($quotalimit['name'], $quotalimit['quota_type'], $quotalimit['per_session'], $quotalimit['limit_type'], $quotalimit['bytes_in_avail'], $quotalimit['bytes_out_avail'], $quotalimit['bytes_xfer_avail'], $quotalimit['files_in_avail'], $quotalimit['files_out_avail'], $quotalimit['files_xfer_avail']);
  return $new->save() ? $new : NULL;
 }
}
