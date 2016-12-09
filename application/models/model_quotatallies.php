<?php

class Model_Quotatallies extends Model {

 public function get_data() {
  $quotatallys = new Collection;
  foreach (QuotaTally::find_all() as $quotatally) {
   $quotatallys->addItem($quotatally, $quotatally->$quotatallyid);
  }
  return $quotatallys;
 }

 public function delete($quotatallyid) {
  return $this->get_data()->getItem($quotatallyid)->delete();
 }
}
