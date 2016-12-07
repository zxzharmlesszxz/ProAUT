<?php

class Model_Quotatallies extends Model {

 public function get_data() {
  $quotatallys = new Collection;
  foreach (QuotaTally::find_all() as $quotatally) {
   $quotatallys->addItem($quotatally, $quotatally->$quotatallyid);
  }
  return $quotatallys;
 }

 public function delete(integer $quotatallyid) {
  return QuotaTally::find_by_id($quotatallyid)->delete();
 }
}
