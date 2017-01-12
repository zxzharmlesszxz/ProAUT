<h1>Admins</h1>
<p class="form">
<input type="text" value="" placeholder="login" name="admin[login]"/>
<input type="password" value="" placeholder="password" name="admin[password]"/>
<input type="text" value="" placeholder="username" name="admin[username]"/>
<input type="text" value="" placeholder="email" name="admin[email]"/>
 <button id="createAdmin">Create new Admin</button>
</p>
<p><button alt="Add new Admin" title="Add new Admin" id="show">Add new Admin</button></p>
<p>
<table id='table' class='display'>
<thead>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
 <th>Status</th>
</thead>
<tfoot>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
 <th>Status</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo '<tr>
   <td>'.$row->login.'<span class="actions">
    <img data-id="'.$row->adminid.'" class="deleteAdmin" src="/images/delete.png" title="Delete" alt="Delete"/>
    <img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/admins/edit/?adminid='.$row->adminid.'\'"/></span>
   </td>
   <td>'.$row->username.'</td>
   <td>'.$row->email.'</td>
   <td><input class="status" type="checkbox" data-id="'.$row->adminid.'" '.(((int) $row->status != 0)?'checked value="1"':'value="0"').' /></td>
  </tr>';
 }
 
?>
 </tbody>
</table>
</p>
