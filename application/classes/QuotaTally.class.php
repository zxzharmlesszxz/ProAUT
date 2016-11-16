<?php

/**
* 
*/

class QuotaTally extends Quota{
 protected static $table_name = 'quotatallies';
 protected static $db_fields = array('quotatallyid', 'name', 'quota_type', 'bytes_in_used', 'bytes_out_used', 'bytes_xfer_used', 'files_in_used', 'files_out_used', 'files_xfer_used');
 
 public $quotatallyid;
 public $bytes_in_used;
 public $bytes_out_used;
 public $bytes_xfer_used;
 public $files_in_used;
 public $files_out_used;
 public $files_xfer_used;
}

?>