<h1>Quota Limits</h1>
<p>
<table id='table' class='display'>
<thead>
 <th>Name</th>
 <th>Quota type</th>
 <th>Bytes in used</th>
 <th>Bytes out used</th>
 <th>Bytes xfer used</th>
 <th>Files in used</th>
 <th>Files out used</th>
 <th>Files xfer used</th>
</thead>
<tfoot>
 <th>Name</th>
 <th>Quota type</th>
 <th>Bytes in used</th>
 <th>Bytes out used</th>
 <th>Bytes xfer used</th>
 <th>Files in used</th>
 <th>Files out used</th>
 <th>Files xfer used</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo '<tr>
   <td>'.$row->name.'<span class="actions"><button class="delete" alt="Delete" title="Delete" data-id="'.$row->quotatallyid.'" data-type="qoutatally"></button></span></td>
   <td>'.$row->quota_type.'</td>
   <td>'.$row->bytes_in_used.'</td>
   <td>'.$row->bytes_out_used.'</td>
   <td>'.$row->bytes_xfer_used.'</td>
   <td>'.$row->files_in_used.'</td>
   <td>'.$row->files_out_used.'</td>
   <td>'.$row->files_xfer_used.'</td>
  </tr>';
 }
 
?>
 </tbody>
</table>
</p>