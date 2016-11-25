<?php

/**
*
*/

class QuotaTally extends Quota{
 protected static $table_name = 'quotatallies';
 protected static $db_fields = array(
				'quotatallyid', 'name', 'quota_type',
				'bytes_in_used', 'bytes_out_used',
				'bytes_xfer_used', 'files_in_used',
				'files_out_used', 'files_xfer_used'
				);

 private $quotatallyid;
 private $bytes_in_used;
 private $bytes_out_used;
 private $bytes_xfer_used;
 private $files_in_used;
 private $files_out_used;
 private $files_xfer_used;
}
