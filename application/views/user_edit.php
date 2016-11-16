<h1>User</h1>
<p>
<table id='1table' class='display'>
<thead>
 <th>Param</th>
 <th>Value</th>
</thead>
<tfoot>
 <th>Param</th>
 <th>Value</th>
</tfoot>
<tbody>
<?php

  echo '<tr><td><label for="login">Login</label></td><td><input type="text" value="'.$data->login.'" name="user[login]"/></td></tr>';
  echo '<tr><td><label for="username">User Name</label></td><td><input type="text" value="'.$data->username.'" name="user[username]"/></td></tr>';
  echo '<tr><td><label for="email">Email</label></td><td><input type="email" value="'.$data->email.'" name="user[email]"/></td></tr>';
  echo '<tr><td><label for="homedir">Homedir</label></td><td><input type="text" value="'.$data->homedir.'" name="user[homedir]"/></td></tr>';
  echo '<tr><td><label for="uid">Uid</label></td><td><input type="number" value="'.$data->uid.'" name="user[uid]"/></td></tr>';
  echo '<tr><td><label for="gid">Gid</label></td><td><input type="number" value="'.$data->gid.'" name="user[gid]"/></td></tr>';
  echo '<tr><td><label for="shell">Shell</label></td><td><input type="text" value="'.$data->shell.'" name="user[shell]"/></td></tr>';
  echo '<tr><td><label for="status">Status</label></td><td><input type="checkbox" '.(((int) $data->status != 0)?'checked value="1"':'value="0"').' name="user[status]" /></td></tr>';
  echo '<tr><td><label for="password">Password(Please input password if you want to change it.)</label></td><td><input type="password" value="" name="user[password]"/></td></tr>';
  echo '<tr><td><label for="repassword">Repite password</label></td><td><input type="password" value="" name="user[repassword]"/></td></tr>';
  echo '<tr><td></td><td><button id="saveUser">Save</button></td></tr>';
?>
 </tbody>
</table>
</p>