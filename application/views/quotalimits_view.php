<h1>Quota Limits</h1>
<p class="form hide">
<input type="text" value="" placeholder="name" name="quotalimit[name]" />
<select name="quotalimit[quota_type]" id="quota_type">
 <option disabled selected value="">Quota type</option>
 <option value="user">User</option>
 <option value="group">Group</option>
 <option value="class">Class</option>
 <option value="all">All</option>
</select>
<select name="quotalimit[limit_type]" id="limit_type">
 <option disabled selected value="">Limit type</option>
 <option value="soft">Soft</option>
 <option value="hard">Hard</option>
</select>
<label for="quotalimit[per_session]">Per session</label><input type="checkbox" placeholder="per_session" name="quotalimit[per_session]" value="0" />
<input type="number" value="" placeholder="bytes_in_avail" name="quotalimit[bytes_in_avail]" />
<input type="number" value="" placeholder="bytes_out_avail" name="quotalimit[bytes_out_avail]" />
<input type="number" value="" placeholder="bytes_xfer_avail" name="quotalimit[bytes_xfer_avail]" />
<input type="number" value="" placeholder="files_in_avail" name="quotalimit[files_in_avail]" />
<input type="number" value="" placeholder="files_out_avail" name="quotalimit[files_out_avail]" />
<input type="number" value="" placeholder="files_xfer_avail" name="quotalimit[files_xfer_avail]" />
 <button id="createQuotalimit">Create new quotalimit</button>
</p>
<p><button alt="Add new Quota" title="Add new Quota" id="show">Add new Quota</button></p>
<p>
<table id='table' class='display'>
<thead>
 <th>Name</th>
 <th>Quota type</th>
 <th>Limit type</th>
 <th>Per Session</th>
 <th>Bytes in avail</th>
 <th>Bytes out avail</th>
 <th>Bytes xfer avail</th>
 <th>Files in avail</th>
 <th>Files out avail</th>
 <th>Files xfer avail</th>
</thead>
<tfoot>
 <th>Name</th>
 <th>Quota type</th>
 <th>Limit type</th>
 <th>Per Session</th>
 <th>Bytes in avail</th>
 <th>Bytes out avail</th>
 <th>Bytes xfer avail</th>
 <th>Files in avail</th>
 <th>Files out avail</th>
 <th>Files xfer avail</th>
</tfoot>
<tbody>
<?php
 foreach ($data->keys() as $item) {
  $row = $data->getItem($item);
  echo <<<EOT
<tr>
 <td>$row->name<span class="actions"><button class="delete" alt="Delete" title="Delete" data-id="$row->quotalimitid" data-type="quotalimit"></button><button class="edit" alt="Edit" title="Edit" onclick="location.href='/quotalimits/edit/?quotalimitid=$row->quotalimitid'"></button></span></td>
 <td>$row->quota_type</td>
 <td>$row->limit_type</td>
 <td>$row->per_session</td>
 <td>$row->bytes_in_avail</td>
 <td>$row->bytes_out_avail</td>
 <td>$row->bytes_xfer_avail</td>
 <td>$row->files_in_avail</td>
 <td>$row->files_out_avail</td>
 <td>$row->files_xfer_avail</td>
</tr>
EOT;
 }
?>
 </tbody>
</table>
</p>
