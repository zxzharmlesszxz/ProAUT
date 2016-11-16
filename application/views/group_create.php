<h1>Group</h1>
<p><?php var_dump($data); ?></p>
<p>
<table class='display'>
<thead>
 <th>Groupname</th>
 <th>Gid</th>
</thead>
<tfoot>
 <th>Groupname</th>
 <th>Gid</th>
</tfoot>
<tbody>
  <tr>
   <td>
    <form method="POST" action="/groups/create/">
     <input tupe="text" name="groupname" value="" />
     <input tupe="number" name="gid" value="" />
     <input type="submit" value="Create" />
    </form>
   </td>
  </tr>
 </tbody>
</table>
</p>
