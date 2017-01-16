<?php

echo <<<EOT
<h1>Admin</h1>
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
 <tr>
  <td>
   <label for="login">Login</label></td><td><input type="text" readonly="true" value="$data->login" name="admin[login]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="username">User Name</label></td><td><input type="text" value="$data->username" name="admin[username]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="email">Email</label></td><td><input type="email" value="$data->email" name="admin[email]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="status">Status</label></td><td><input type="checkbox" value="$data->status" name="admin[status]" />
  </td>
 </tr>
 <tr>
  <td>
   <label for="password">Password(Please input password if you want to change it.)</label></td><td><input type="password" value="" name="admin[password]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="repassword">Repite password</label></td><td><input type="password" value="" name="admin[repassword]"/>
  </td>
 </tr>
 <tr>
  <td>
   </td><td><button class="save" data-id="$data->adminid" data-type="admin">Save</button>
  </td>
 </tr>
 </tbody>
</table>
</p>
EOT;
