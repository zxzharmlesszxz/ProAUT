<h1>Group</h1>
<p>
<table id='table' class='display'>
<thead>
 <tr>
  <th>Groupname</th>
  <th>Gid</th>
  <th>Members</th>
  <th>Actions</th>
  <th>Users</th>
 </tr>
</thead>
<tfoot>
 <tr>
  <th>Groupname</th>
  <th>Gid</th>
  <th>Members</th>
  <th>Actions</th>
  <th>Users</th>
 </tr>
</tfoot>
<tbody>
<?php

  echo '<tr><td>'.$data->groupname.'</td><td>';
  echo $data->gid.'</td><td>';
  echo '<select id="members" multiple data-id="'.$data->groupid.'">';
  if(!empty($data->members)){
   foreach(explode(',', $data->members) as $member){
    //echo '<span data-id="'.$data->groupid.'" class="removeMember">'.$member.'</span><br />';
    echo '<option value="'.$member.'">'.$member.'</option>';
   }
  }
  echo '</select>';
  echo '</td><td>';
  echo '<button class="addMember left" alt="Add member" title="Add member"></button></span>';
  echo '<button class="removeMember right" alt="Remove member" title="Remove member"></span>';
  echo '</td><td>';
  echo '<select id="users" multiple>';
  foreach(User::find_all() as $user){
   if(!in_array($user->login, explode(',', $data->members))){
    //echo '<span data-id="'.$data->groupid.'">'.$user->login.'</span><br />';
    echo '<option value="'.$user->login.'">'.$user->login.'</option>';
   }
  }
  echo '</select>';
  echo '</td></tr>';
 
?>
 </tbody>
</table>
</p>