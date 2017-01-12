<h1>Users</h1>
<p class="form">
<input type="text" value="" placeholder="login" name="user[login]"/>
<input type="password" value="" placeholder="password" name="user[password]"/>
<input type="text" value="" placeholder="username" name="user[username]"/>
<input type="text" value="" placeholder="email" name="user[email]"/>
<input type="text" value="" placeholder="homedir" name="user[homedir]"/>
<input type="text" value="" placeholder="uid" name="user[uid]"/>
<input type="text" value="" placeholder="gid" name="user[gid]"/>
<input type="text" value="" placeholder="shell" name="user[shell]"/>
 <button id="createUser">Create new user</button>
</p>
<p><button alt="Add new uesr" title="Add new user" id="show">Add new user</button></p>
<p>
<table id='table' class='display'>
<thead>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
 <th>Homedir</th>
 <th>Status</th>
</thead>
<tfoot>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
 <th>Homedir</th>
 <th>Status</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo '<tr>
   <td>'.$row->login.'<span class="actions">
    <img data-id="'.$row->userid.'" class="deleteUser" src="/images/delete.png" title="Delete" alt="Delete"/>
    <img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/users/edit/?userid='.$row->userid.'\'"/></span>
   </td>
   <td>'.$row->username.'</td>
   <td>'.$row->email.'</td>
   <td>'.$row->homedir.'</td>
   <td><input class="status" type="checkbox" data-id="'.$row->userid.'" '.(((int) $row->status != 0)?'checked value="1"':'value="0"').' /></td>
  </tr>';
  //<td><div class="toggle toggle-modern" data-id="'.$row->userid.'" id="status-'.$row->login.'"></div><script>'.(($row->status == 1)?'$("#status-'.$row->login.'").trigger( "click" );':'').'</script></td>
 }
 
?>
 </tbody>
</table>
</p>
