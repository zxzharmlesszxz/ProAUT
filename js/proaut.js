$(document).ready(function(){
  // DataTable jquery plugin
  //var table = $('#table').DataTable({"stateSave": true});
  var table = $('#table').DataTable();
  $('#table.search tfoot th').each(function(){var title = $('#table.search thead th').eq($(this).index()).text();$(this).html('<input type="text" placeholder="'+title+'" />');});

  // Apply the search
  if(table.columns().eq(0)){table.columns().each(function(colIdx){$('input', table.column(colIdx).footer()).on('keyup change', function(){table.column(colIdx).search(this.value).draw();});});}

  // Autocheck checkbox if value = 1
  $('input[type="checkbox"].status').each(function(){ ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false); });
  $('input[type="checkbox"][name="quotalimit[per_session]"]').each(function(){ ($(this).val() == 'true') ? $(this).prop('checked', true) : $(this).prop('checked', false); });

  // Group functions
  $(document).on('click','button.addMember', function(event){
    var el = $('select#users'),
     els = $('select#users option:selected'),
     id = $('select#members').data('id');
     els.each(function(){
      var user = $(this),
        username = user.val();
      $.ajax({
       url: '/groups/addMember/',
       data: "groupid="+id+"&member="+username,
       type: 'post',
       success: function(){
        user.remove().appendTo($('select#members'));
       }
      });
    });
  });

  $(document).on('click','button.removeMember', function(event){
    var el = $('select#members'), 
     els = $('select#members option:selected'),
     id = el.data('id');
     els.each(function(){
      var user = $(this),
        username = user.val();
      $.ajax({
       url: '/groups/removeMember/',
       data: "groupid="+id+"&member="+username,
       type: 'post',
       success: function(){
        user.remove().appendTo($('select#users'));
       }
      });
    });
  });

  $(document).on('click','#createGroup', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     send = '';

    form.children('input').each(function(){
      send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    $.ajax({
     url: '/groups/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
       if (data != false) {
        table.append('<tr><td>'+data['groupname']+'<span class="actions"><img data-id="'+data['groupid']+'" class="deleteGroup" src="/images/delete.png" title="Delete" alt="Delete"/><img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/groups/edit/?groupid='+data['groupid']+'\'"/></span></td><td>'+data['gid']+'</td><td></td></tr>');
       } else {
        alert('Error in group create!');
       }
     }
    });
  });

  // Change status checkbox functions
  $(document).on('change',"input[type=checkbox].status", function(event){
    var el = $(this),
    id = el.data('id'),
    type = el.data('type');
    if(el.is(':checked')){
      el.attr('value',1);
    }else{
      el.attr('value',0);
    }
    $.ajax({
     url: '/'+type+'s/changeStatus/',
     data: type+"id="+id,
     type: 'post',
     success: function(){
     }
    });
  });
/*
  $(document).on('change',"input[type=checkbox].status", function(event){
    var el = $(this),
     checked = el.prop('checked'),
     id = el.data('id'),
     type = el.data('type');
    $.ajax({
     url: '/'+type+'s/changeStatus/',
     data: type+"id="+id,
     type: 'post',
     success: function(){
     }
    });
  }); */

  // User functions
  $(document).on('click','#createUser', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     send = '';
     form.children('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    $.ajax({
     url: '/users/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
       if (data != false) {
         table.append('<tr><td>'+data['login']+'<span class="actions"><img data-id="'+data['userid']+'" class="deleteUser" src="/images/delete.png" title="Delete" alt="Delete"/><img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/users/edit/?userid='+data['userid']+'\'"/></span></td><td>'+data['username']+'</td><td>'+data['email']+'</td><td>'+data['homedir']+'</td><td><input class="status" type="checkbox" data-id="'+data['userid']+'" '+((data['status'] != 0)?'checked':'')+' /></td></tr>');
       } else {
        alert('Error in user create!');
       }
     }
    });
  });

  // User functions
  $(document).on('click','#createAdmin', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     send = '';
     form.children('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    $.ajax({
     url: '/admins/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
       if (data != false) {
         table.append('<tr><td>'+data['login']+'<span class="actions"><img data-id="'+data['adminid']+'" class="deleteAdmin" src="/images/delete.png" title="Delete" alt="Delete"/><img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/admins/edit/?adminid='+data['adminid']+'\'"/></span></td><td>'+data['username']+'</td><td>'+data['email']+'</td><td><input class="status" type="checkbox" data-id="'+data['adminid']+'" '+((data['status'] != 0)?'checked':'')+' /></td></tr>');
       } else {
        alert('Error in admin create!');
       }
     }
    });
  });

  // QuotaLimit functions
  $(document).on('click','#createQuotalimit', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     send = '';

    form.children('input').each(function(){
      send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    form.children('select').each(function(){
      $(this).children('option:selected').each(function(){
        send += $(this).parent().prop('name')+'='+$(this).val()+'&';
      });
    });

    $.ajax({
     url: '/quotalimits/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
      if (data != false) {
       table.append('<tr><td>'+data['name']+'<span class="actions"><img data-id="'+data['quotalimitid']+'" class="deleteQuotalimit" src="/images/delete.png" title="Delete" alt="Delete"/><img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/quotalimits/edit/?quotalimitid='+data['quotalimitid']+'\'"/></span></td><td>'+data['quota_type']+'</td><td>'+data['limit_type']+'</td><td>'+data['per_session']+'</td><td>'+data['bytes_in_avail']+'</td><td>'+data['bytes_out_avail']+'</td><td>'+data['bytes_xfer_avail']+'</td><td>'+data['files_in_avail']+'</td><td>'+data['files_out_avail']+'</td><td>'+data['files_xfer_avail']+'</td></tr>');
      } else {
       alert('Error while adding new QuotaLimit');
      }
     }
    });
  });

  $(document).on('click','button#show', function(event){
    $('p.form').toggleClass('hide');
  });

// Delete function
  $(document).on('click','button.delete', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     result = type + " #" + id + " has been removed.";
     if (type == 'quotatally') { link = '/quotatalies/delete/' } else { link = '/'+type+'s/delete/'}

    $.ajax({
     url: link,
     data: type+"id="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

// Save function
  $(document).on('click','button.save', function(event){
    var table = $('#table'),
     el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     form = $(this).parent().parent().parent(),
     send = type+'['+type+'id]='+id+'&',
     p = form.parent().parent();
     form.children().find('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });

    $.ajax({
     url: '/'+type+'s/update/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
      p.prepend('<b>'+type+' data updated!</b>');
     }
    });
  });

});
