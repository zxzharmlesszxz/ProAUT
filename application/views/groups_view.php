<h1>Groups</h1>
<p>
 <b>Create new group</b>
  <input tupe="text" name="groupname" value="" placeholder="Groupname" />
  <input type="number" name="gid" value="<?php echo config()->DEFAULT_GID; ?>" />
  <button id="createGroup" title="Create" alt="Create">Create</button>
</p>
<p>
<table id='table' class='display'>
<thead>
 <th>Groupname</th>
 <th>Gid</th>
 <th>Members</th>
</thead>
<tfoot>
 <th>Groupname</th>
 <th>Gid</th>
 <th>Members</th>
</tfoot>
<tbody>
<?php

 foreach ($data->keys() as $item) {
  $row = $data->getItem($item);
  echo <<EOL
   <tr>
    <td>$row->groupname<span class="actions">
     <img data-id="$row->groupid" class="deleteGroup" src="/images/delete.png" title="Delete" alt="Delete"/>
     <img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href='/groups/edit/?groupid=$row->groupid'"/></span>
    </td>
    <td>$row->gid</td>
   <td>
EOL
  foreach (explode(',', $row->members) as $member) {
   echo empty($member) ? '' : '<a href="/users/show/?login='.$member.'">'.$member.'</a>, ';
  }
  echo '</td></tr>';
 }
 
?>
 </tbody>
</table>
</p>
