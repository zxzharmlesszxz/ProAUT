<h1>Users</h1>
<p class="form hide">
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
    <button class="delete"></button>
    <button class="edit"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA5pJREFUeNpMU11oW2UYfs5Pcs5J0pyk+VnaVCumw1nD1jZbh5N1iK2I6GCCQ6Eg82LQ3ChDoXMXXkyv/JlDSy9EQaGdjOqkqLANxW5sczVr1212o+3apEm2Jkuav3N6Tk5yzueJdeILH9/Hy/u+PO/zPB+VzRFciyX68qocXc/p2Ynvly857BbQNEAMgCIqWvwcmgTHDM3XFut1AxRF4WFQ351exmq6MOLyWKJOp4CqUi81CmizxjAIpqbvQfQGUCvJMUPLvGGz8elGnmBzCPvL+TWLP0h633275+FQEf8Lu53BfKUNXV3Cc2fHpyeVSulp4nBpNasN0Otg16UCXtn9RFiSNJy7kARnpcCYCOQNAzu7feje0Ywzn8yC19sb+R1ZsLaAltfC6dNwiA6wz+7zhGy8hfC8FcGAmWApExyBouhwOa0QnU58fDSM+2sSPrqyMUnK68WB5ikwyoyJLgB2b+/je9YLspAvSnCJFlgsDfYAt4cgkSqjUMhgd6QFTU4WAy9tT0WUPzA/8ucLaqBtwc/7l9lcQa7ZBQqVSg03b+dhs1n+279BlWKuspaRIFEC/KIecsWnRp7yBqKaXJIf5NhhFrRZpBGEHnOjxWsHxWy2UoSCYd66bqChTk4CJo58/mKxvwP7wgaqZ36yZ2iul/W57SiUFCRWizj7uymZaDX1Iw2FoRMC1XyFO7diy/w4Xu4bxcLW93Di5wTa0snBJ3ftHGPzufrFOysVY6CvnT74qoia2URRNGidwNJk0qkB1786BcuW9xHpiUMbOoyJW/SgLyiMcZQGVtaURLWury0WjNarl1NIJiUIHAOryCJXEuG8cgqHDo5CNJaQOAzMVrcPhbv4Mau7GTnKB3ZXxEHu3S/FZufK+5/pexT5rAHGRlABg/jXY+h//qTprLtQjwKTPR/g9t43KxGPDFmqIl6tgvY6fQh3eEZvXEsh9UBDUTWQqTNYOfkN+m2DaG25i79eA77sPI7Ap8dQSWWP/3g+xVycK+HqHQXU+ETSNA+NpYX4hyWFhBTeBy63an3d8e2B7kdmkfjiFs61D11KHPosxS9ehypvlBmBfYuhaOWfv1As18BxLNoC/DEqZ2DPNg648Ns707HLBwo3Whezwf0/9ByJDncFdfw6pyLU5oTHK6Cub3qF5jgajKl9iTTBrabRMXMCQvYmV1xxRWOxpW2+TvewVTWNVFZBWAZKVUd5ow7p3/O3AAMAB8GXG4kzypYAAAAASUVORK5CYII=" title="Edit" alt="Edit" onclick="location.href=\'/users/edit/?userid='.$row->userid.'\'"/></button></span>
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
