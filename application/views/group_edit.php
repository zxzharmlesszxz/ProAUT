<h1>Group</h1>
<p>
<table id='table' class='display'>
<thead>
 <th>Groupname</th>
 <th>Gid</th>
 <th>Members</th>
 <th>Actions</th>
 <th>Users</th>
</thead>
<tfoot>
 <th>Groupname</th>
 <th>Gid</th>
 <th>Members</th>
 <th>Actions</th>
 <th>Users</th>
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
  echo '<span class="addMember"><img src="/images/left.gif" /></span>';
  echo '<span class="removeMember"><img src="/images/right.gif" /></span>';
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