<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title>ProAUT - ProFTP Administrate Users Tool</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
  <link rel="stylesheet/less" type="text/css" href="/less/style.less">
  <script src="/js/jquery-2.1.3.min.js" type="text/javascript"></script>
  <script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css" />
  <script src="/js/html5shiv.js" type="text/javascript"></script>
  <script src="/js/less.js" type="text/javascript"></script>
  <script type="text/javascript">
   $(document).ready(
    function(){
     //var table = $('#table').DataTable({"stateSave": true});
     var table = $('#table').DataTable();$('#table.search tfoot th').each(function(){var title = $('#table.search thead th').eq($(this).index()).text();$(this).html('<input type="text" placeholder="'+title+'" />');});

     // Apply the search
     if(table.columns().eq(0)){table.columns().each(function(colIdx){$('input', table.column(colIdx).footer()).on('keyup change', function(){table.column(colIdx).search(this.value).draw();});});}

        //if ($('input[type="checkbox"]').val() == 1)  $('input[type="checkbox"]').prop('checked', true);
        $('input[type="checkbox"]').each(function(){ ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false); });
    }
   );
  </script>
  <script type="text/javascript" src="/js/proaut.js"></script>
 </head>
 <body>
  <header id="header">
   <div id="logo">
    <a href="/">ProFTP Administrate Users Tool</a>
   </div>
   <nav id="menu">
    <menu>
     <li class="first active"><a href="/">Main</a></li>
     <li><a href="/groups">Groups</a></li>
     <li><a href="/users">Users</a></li>
     <li><a href="/quotalimits">Quota Limits</a></li>
     <li><a href="/quotatallies">Quota tallies</a></li>
     <li class="last"><a href="/contacts">Contacts</a></li>
    </menu>
    <br class="clearfix" />
   </nav>
  </header>
  <div id="wrapper">
   <div id="page">
    <div id="content">
     <div class="box">
      <?php if(!empty($content_view)) include 'application/views/'.$content_view; ?>
     </div>
     <br class="clearfix" />
    </div>
    <br class="clearfix" />
   </div>
   <div id="page-bottom">
    <div id="page-bottom-sidebar">
     <h3>Contacts</h3>
     <ul class="list">
      <li class="last">email: zxzharmlesszxz@gmail.com</li>
     </ul>
    </div>
    <div id="page-bottom-content">
     <h3>About</h3>
     <p>
     ProAUT - tool for managment proftp users stored in MySQL database.
     </p>
    </div>
    <br class="clearfix" />
   </div>
  </div>
  <footer id="footer">
   <a href="/">ProAUT</a> &copy; 2015-<?php echo date("Y"); ?>
  </footer>
 </body>
</html>
