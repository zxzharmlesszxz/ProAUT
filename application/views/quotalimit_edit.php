<?php
echo <<<EOT
<h1>Quota Limits</h1>
<p>
<table id='1table' class='display'>
 <thead>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </tfoot>
 <tbody>
  <tr>
   <td>
    <label for="">Name</label>
   </td>
   <td>
    <input type="text" name="quotalimit[name]" value="$data->name" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Quota type</label>
   </td>
   <td>
    <input type="text" name="quotalimit[quota_type]" value="$data->quota_type" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Limit type</label>
   </td>
   <td>
    <input type="text" name="quotalimit[limit_type]" value="$data->limit_type" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Per session</label>
   </td>
   <td>
    <input type="checkbox" name="quotalimit[per_session]" value="$data->per_session" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Bytes in avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[bytes_in_avail]" value="$data->bytes_in_avail" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Bytes out avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[bytes_out_avail]" value="$data->bytes_out_avail" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Bytes xfer avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[bytes_xfer_avail]" value="$data->bytes_xfer_avail" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Files in avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[files_in_avail]" value="$data->files_in_avail" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Files out avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[files_out_avail]" value="$data->files_out_avail" />
   </td>
  </tr>
  <tr>
   <td>
    <label for="">Files xfer avail</label>
   </td>
   <td>
    <input type="number" name="quotalimit[files_xfer_avail]" value="$data->files_xfer_avail" />
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
    <button class="save" data-id="$data->quotalimitid" data-type="quotalimit">Save</button>
   </td>
  </tr>
 </tbody>
</table>
</p>
EOT
?>