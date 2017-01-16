<h1>Groups</h1>
<p>If you add new group, you must add lines with permitions to config file proftpd.conf</p>
<p class="form hide">
 <b>Create new group</b>
  <input tupe="text" name="groupname" value="" placeholder="Groupname" required />
  <input type="number" name="gid" value="" placeholder="<?php echo config()->DEFAULT_GID; ?>" />
  <button id="create" title="Create" alt="Create">Create</button>
</p>
<p><button alt="Add new group" title="Add new group" id="show">Add new group</button></p>
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
  $members = '';
  foreach (explode(',', $row->members) as $member) {
   $members .= empty($member) ? '' : '<a href="/users/show/?login='.$member.'">'.$member.'</a>, ';
  }
  echo <<<EOT
   <tr>
    <td>
     $row->groupname
     <span class="actions">
      <button class="delete" alt="Delete" title="Delete" data-id="$row->groupid" data-type="group"></button>
      <button class="edit" alt="Edit" title="Edit" onclick="location.href='/groups/edit/?groupid=$row->groupid'"></button>
     </span>
    </td>
    <td>$row->gid</td>
   <td>$members</td>
  </tr>
EOT;
 }
 
?>
 </tbody>
</table>
</p>
