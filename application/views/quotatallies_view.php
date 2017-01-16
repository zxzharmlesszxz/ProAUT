<h1>Quota Limits</h1>
<p>
<table id='table' class='display'>
<thead>
 <th>Name</th>
 <th>Quota type</th>
 <th>Bytes in used</th>
 <th>Bytes out used</th>
 <th>Bytes xfer used</th>
 <th>Files in used</th>
 <th>Files out used</th>
 <th>Files xfer used</th>
</thead>
<tfoot>
 <th>Name</th>
 <th>Quota type</th>
 <th>Bytes in used</th>
 <th>Bytes out used</th>
 <th>Bytes xfer used</th>
 <th>Files in used</th>
 <th>Files out used</th>
 <th>Files xfer used</th>
</tfoot>
<tbody>
<?php

 foreach($data as $row){
  echo '<tr>
   <td>'.$row->name.'<span class="actions">
  <img data-id="'.$row->quotatallyid.'" class="deleteQuotatally" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hJREFUeNo8U8tvVHUU/n733pk7rzudh6WdB53OTB8IgmkEWyFpM4pYMbEbN66IMS7qgiiuXOgfYGNicKErV+5cYdJoiFQ0hVIJqUyhJS3MA1rpnVfnzp2574c/QPytTvI733fO+b5zyC8ffQjWy6NXF1H56waYoSFEhPAku74+k0+nj7EsiG5Yd9V2YylkWDcyHI/EieMgoyOA0gOH/57LsWjrBjKt5oU3s8Of9p+dTXPBAOC4gKajVa892tvc+FZvtRfAMM9hlMDjAREE7JfL/qnB/sXZmekConHAwwOdLlzHBPHxiMXjByPJ5FfS0pU5V9PfJl5eftqB22xi7/595DV5cebduQICAtTtbcC24UbDsB0bZrMORerAk8mBnZw85T6sXkaj/hoCPjDdUgmhaunc9EvHnoGLRXQiUcghP/TdHTjiHhpgoaSHod65jX3Couy4UyiuzaPZAif0pPyhIy9+SdIHId9dhxyPwrfwNYKNOh7PzUJsNnDg0mUMjY+jfH4e+uoKeskU/a99kRAbf3IpITQbTyRzlmnAIgROr4dwTQR3YADxi99THToYpmCDEnUpKTgPWM6LBh9IBKuls0yf6x5GIAiFzuzQ6pzSReW9OUjXlyG8cgLDhTcg37qJm6en4ZYrYFNpapkDI8CjKUsZJkhFsqiFps8Pi5oOnkdLUyEpyv9WWZYNTVPgUJBNcxkhCOL1QzJtwgjAhra1hV5HgqOokCMxpH78CUOnz6BbKaNzbxPRySlM/rYMNzsCs9eFLslo3duAxDIVzuvz/erd3Snt2XaObzWh5ccwOjYGU1Xx97n3oVKbTy1dQ4i2rhoG9levg/C+J8X+CR+dWCTuhXmgWPxg9fHeD0z+EIzbtxCi1XUqXnv5d7hUWGb0MJj+ftQu/YzoSBbSgyr4o0c+FiaOf0fczz8DaEviH1eWViyzMJDJQtvahGFa8Awm6CJZkB89hCWb6KPgJ3FPCK9ECmdOslQzBroJJFIYePXkOzlRvPpgbQ1tusZuNAadCml0FXjDMfCxPjSqFeyq1jXu5Ym3vAE/HeP5MdGAWqPmRsYKek38ZFsUz3ccZAlD4LouHNuFzmBHIcxFJjW4wBKarmsg9KieEdA5YVvQ6OWF4y98k+S8y2K7/XpX0cdNAmIH+G3b578KByssJQS19SmGvn8FGADYMJ5MCqd5aQAAAABJRU5ErkJggg==" title="Delete" alt="Delete"/></span></td>
   <td>'.$row->quota_type.'</td>
   <td>'.$row->bytes_in_used.'</td>
   <td>'.$row->bytes_out_used.'</td>
   <td>'.$row->bytes_xfer_used.'</td>
   <td>'.$row->files_in_used.'</td>
   <td>'.$row->files_out_used.'</td>
   <td>'.$row->files_xfer_used.'</td>
  </tr>';
 }
 
?>
 </tbody>
</table>
</p>