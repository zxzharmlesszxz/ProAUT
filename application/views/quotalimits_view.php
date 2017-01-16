<h1>Quota Limits</h1>
<p class="form hide">
<input type="text" value="" placeholder="name" name="quotalimit[name]" />
<select name="quotalimit[quota_type]" id="quota_type">
 <option disabled selected value="">Quota type</option>
 <option value="user">User</option>
 <option value="group">Group</option>
 <option value="class">Class</option>
 <option value="all">All</option>
</select>
<select name="quotalimit[limit_type]" id="limit_type">
 <option disabled selected value="">Limit type</option>
 <option value="soft">Soft</option>
 <option value="hard">Hard</option>
</select>
<label for="quotalimit[per_session]">Per session</label><input type="checkbox" placeholder="per_session" name="quotalimit[per_session]" value="0" />
<input type="number" value="" placeholder="bytes_in_avail" name="quotalimit[bytes_in_avail]" />
<input type="number" value="" placeholder="bytes_out_avail" name="quotalimit[bytes_out_avail]" />
<input type="number" value="" placeholder="bytes_xfer_avail" name="quotalimit[bytes_xfer_avail]" />
<input type="number" value="" placeholder="files_in_avail" name="quotalimit[files_in_avail]" />
<input type="number" value="" placeholder="files_out_avail" name="quotalimit[files_out_avail]" />
<input type="number" value="" placeholder="files_xfer_avail" name="quotalimit[files_xfer_avail]" />
 <button id="createQuotalimit">Create new quotalimit</button>
</p>
<p><button alt="Add new Quota" title="Add new Quota" id="show">Add new Quota</button></p>
<p>
<table id='table' class='display'>
<thead>
 <th>Name</th>
 <th>Quota type</th>
 <th>Limit type</th>
 <th>Per Session</th>
 <th>Bytes in avail</th>
 <th>Bytes out avail</th>
 <th>Bytes xfer avail</th>
 <th>Files in avail</th>
 <th>Files out avail</th>
 <th>Files xfer avail</th>
</thead>
<tfoot>
 <th>Name</th>
 <th>Quota type</th>
 <th>Limit type</th>
 <th>Per Session</th>
 <th>Bytes in avail</th>
 <th>Bytes out avail</th>
 <th>Bytes xfer avail</th>
 <th>Files in avail</th>
 <th>Files out avail</th>
 <th>Files xfer avail</th>
</tfoot>
<tbody>
<?php
 foreach ($data->keys() as $item) {
  $row = $data->getItem($item);
  echo <<<EOT
<tr>
 <td>$row->name
  <span class="actions">
   <img data-id="$row->quotalimitid" class="deleteQuotalimit" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hJREFUeNo8U8tvVHUU/n733pk7rzudh6WdB53OTB8IgmkEWyFpM4pYMbEbN66IMS7qgiiuXOgfYGNicKErV+5cYdJoiFQ0hVIJqUyhJS3MA1rpnVfnzp2574c/QPytTvI733fO+b5zyC8ffQjWy6NXF1H56waYoSFEhPAku74+k0+nj7EsiG5Yd9V2YylkWDcyHI/EieMgoyOA0gOH/57LsWjrBjKt5oU3s8Of9p+dTXPBAOC4gKajVa892tvc+FZvtRfAMM9hlMDjAREE7JfL/qnB/sXZmekConHAwwOdLlzHBPHxiMXjByPJ5FfS0pU5V9PfJl5eftqB22xi7/595DV5cebduQICAtTtbcC24UbDsB0bZrMORerAk8mBnZw85T6sXkaj/hoCPjDdUgmhaunc9EvHnoGLRXQiUcghP/TdHTjiHhpgoaSHod65jX3Couy4UyiuzaPZAif0pPyhIy9+SdIHId9dhxyPwrfwNYKNOh7PzUJsNnDg0mUMjY+jfH4e+uoKeskU/a99kRAbf3IpITQbTyRzlmnAIgROr4dwTQR3YADxi99THToYpmCDEnUpKTgPWM6LBh9IBKuls0yf6x5GIAiFzuzQ6pzSReW9OUjXlyG8cgLDhTcg37qJm6en4ZYrYFNpapkDI8CjKUsZJkhFsqiFps8Pi5oOnkdLUyEpyv9WWZYNTVPgUJBNcxkhCOL1QzJtwgjAhra1hV5HgqOokCMxpH78CUOnz6BbKaNzbxPRySlM/rYMNzsCs9eFLslo3duAxDIVzuvz/erd3Snt2XaObzWh5ccwOjYGU1Xx97n3oVKbTy1dQ4i2rhoG9levg/C+J8X+CR+dWCTuhXmgWPxg9fHeD0z+EIzbtxCi1XUqXnv5d7hUWGb0MJj+ftQu/YzoSBbSgyr4o0c+FiaOf0fczz8DaEviH1eWViyzMJDJQtvahGFa8Awm6CJZkB89hCWb6KPgJ3FPCK9ECmdOslQzBroJJFIYePXkOzlRvPpgbQ1tusZuNAadCml0FXjDMfCxPjSqFeyq1jXu5Ym3vAE/HeP5MdGAWqPmRsYKek38ZFsUz3ccZAlD4LouHNuFzmBHIcxFJjW4wBKarmsg9KieEdA5YVvQ6OWF4y98k+S8y2K7/XpX0cdNAmIH+G3b578KByssJQS19SmGvn8FGADYMJ5MCqd5aQAAAABJRU5ErkJggg==" title="Delete" alt="Delete"/>
   <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA5pJREFUeNpMU11oW2UYfs5Pcs5J0pyk+VnaVCumw1nD1jZbh5N1iK2I6GCCQ6Eg82LQ3ChDoXMXXkyv/JlDSy9EQaGdjOqkqLANxW5sczVr1212o+3apEm2Jkuav3N6Tk5yzueJdeILH9/Hy/u+PO/zPB+VzRFciyX68qocXc/p2Ynvly857BbQNEAMgCIqWvwcmgTHDM3XFut1AxRF4WFQ351exmq6MOLyWKJOp4CqUi81CmizxjAIpqbvQfQGUCvJMUPLvGGz8elGnmBzCPvL+TWLP0h633275+FQEf8Lu53BfKUNXV3Cc2fHpyeVSulp4nBpNasN0Otg16UCXtn9RFiSNJy7kARnpcCYCOQNAzu7feje0Ywzn8yC19sb+R1ZsLaAltfC6dNwiA6wz+7zhGy8hfC8FcGAmWApExyBouhwOa0QnU58fDSM+2sSPrqyMUnK68WB5ikwyoyJLgB2b+/je9YLspAvSnCJFlgsDfYAt4cgkSqjUMhgd6QFTU4WAy9tT0WUPzA/8ucLaqBtwc/7l9lcQa7ZBQqVSg03b+dhs1n+279BlWKuspaRIFEC/KIecsWnRp7yBqKaXJIf5NhhFrRZpBGEHnOjxWsHxWy2UoSCYd66bqChTk4CJo58/mKxvwP7wgaqZ36yZ2iul/W57SiUFCRWizj7uymZaDX1Iw2FoRMC1XyFO7diy/w4Xu4bxcLW93Di5wTa0snBJ3ftHGPzufrFOysVY6CvnT74qoia2URRNGidwNJk0qkB1786BcuW9xHpiUMbOoyJW/SgLyiMcZQGVtaURLWury0WjNarl1NIJiUIHAOryCJXEuG8cgqHDo5CNJaQOAzMVrcPhbv4Mau7GTnKB3ZXxEHu3S/FZufK+5/pexT5rAHGRlABg/jXY+h//qTprLtQjwKTPR/g9t43KxGPDFmqIl6tgvY6fQh3eEZvXEsh9UBDUTWQqTNYOfkN+m2DaG25i79eA77sPI7Ap8dQSWWP/3g+xVycK+HqHQXU+ETSNA+NpYX4hyWFhBTeBy63an3d8e2B7kdmkfjiFs61D11KHPosxS9ehypvlBmBfYuhaOWfv1As18BxLNoC/DEqZ2DPNg648Ns707HLBwo3Whezwf0/9ByJDncFdfw6pyLU5oTHK6Cub3qF5jgajKl9iTTBrabRMXMCQvYmV1xxRWOxpW2+TvewVTWNVFZBWAZKVUd5ow7p3/O3AAMAB8GXG4kzypYAAAAASUVORK5CYII=" title="Edit" alt="Edit" onclick="location.href='/quotalimits/edit/?quotalimitid=$row->quotalimitid'"/>
  </span>
 </td>
 <td>$row->quota_type</td>
 <td>$row->limit_type</td>
 <td>$row->per_session</td>
 <td>$row->bytes_in_avail</td>
 <td>$row->bytes_out_avail</td>
 <td>$row->bytes_xfer_avail</td>
 <td>$row->files_in_avail</td>
 <td>$row->files_out_avail</td>
 <td>$row->files_xfer_avail</td>
</tr>
EOT;
 }
?>
 </tbody>
</table>
</p>
