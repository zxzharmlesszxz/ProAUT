<?php

/**
*
*/

class QuotaLimit extends Quota{
 protected static $table_name = 'quotalimits';
 protected static $db_fields = array(
				'quotalimitid', 'name', 'quota_type',
				'per_session', 'limit_type', 'bytes_in_avail',
				'bytes_out_avail', 'bytes_xfer_avail',
				'files_in_avail', 'files_out_avail',
				'files_xfer_avail');

 private $quotalimitid;
 protected $quota_type;
 private $per_session = 'false';
 private $limit_type;
 private $bytes_in_avail = 0;
 private $bytes_out_avail = 0;
 private $bytes_xfer_avail = 0;
 private $files_in_avail = 0;
 private $files_out_avail = 0;
 private $files_xfer_avail = 0;

 public static function add(
			$name, $quota_type, $per_session, $limit_type,
			$bytes_in_avail, $bytes_out_avail, $bytes_xfer_avail,
			$files_in_avail, $files_out_avail, $files_xfer_avail
			){
  $new = new static;
  $new->name = trim($name);
  $new->quota_type = trim($quota_type);
  $new->per_session = (trim($per_session) or trim($per_session) != '0') ? 'true' : 'false';
  $new->limit_type = trim($limit_type);
  $new->bytes_in_avail = floatval(trim($bytes_in_avail));
  $new->bytes_out_avail = floatval(trim($bytes_out_avail));
  $new->bytes_xfer_avail = floatval(trim($bytes_xfer_avail));
  $new->files_in_avail = intval(trim($files_in_avail));
  $new->files_out_avail = intval(trim($files_out_avail));
  $new->files_xfer_avail = intval(trim($files_xfer_avail));
  return $new;
 }
}
