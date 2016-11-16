<h1>Group</h1>
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
var_dump($_REQUEST);
  echo '<tr><td>'.$data->groupname.'</td><td>'.$data->gid.'</td><td>'.$data->members.'</td></tr>';
 
?>
 </tbody>
</table>
</p>
