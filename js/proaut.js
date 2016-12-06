$(document).ready(function(){
  // Group functions
  $(document).on('click','img.deleteGroup', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id');

    $.ajax({
     url: '/groups/delete/',
     data: "groupid="+id,
     type: 'post',
     success: function(){
      el.parent().parent().parent().html('<td colspan=3>Group #' + id + ' has been removed.</td>');
      setTimeout("el.parent().parent().parent().remove()", 4000);
     }
    });
   };
  });

  $(document).on('click','span.addMember', function(event){
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

  $(document).on('click','span.removeMember', function(event){
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
  $(document).on('change',"input[type=checkbox]", function(event){
    var el = $(this);
     if(el.is(':checked')){
      el.attr('value',1);
     }else{
      el.attr('value',0);
     }
  });

  $(document).on('change',"input[type=checkbox].status", function(event){
    var el = $(this),
     checked = el.prop('checked'),
     id = el.data('id');
    $.ajax({
     url: '/users/changeStatus/',
     data: "userid="+id,
     type: 'post',
     success: function(){
     }
    });
  });

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

  $(document).on('click','img.deleteUser', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     result = "User #" + id + " has been removed.";

    $.ajax({
     url: '/users/delete/',
     data: "userid="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

  $(document).on('click','#saveUser', function(event){
    var table = $('#table'),
     form = $(this).parent().parent().parent(),
     send = '',
     p = form.parent().parent();
     form.children().find('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });
     alert(send);

    $.ajax({
     url: '/users/update/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
      p.prepend('<b>User data updated!</b>');
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
      table.append('<tr><td>'+data['name']+'<span class="actions">'+
  '<img data-id="'+data['quotalimitid']+'" class="deleteQuotalimit" src="/images/delete.png" title="Delete" alt="Delete"/>'+
  '<img src="/images/edit.png" title="Edit" alt="Edit" onclick="location.href=\'/quotalimits/edit/?quotalimitid='+data['quotalimitid']+'\'"/></span></td><td>'+data['quota_type']+
  '</td><td>'+data['limit_type']+
  '</td><td>'+data['per_session']+
  '</td><td>'+data['bytes_in_avail']+
  '</td><td>'+data['bytes_out_avail']+
  '</td><td>'+data['bytes_xfer_avail']+
  '</td><td>'+data['files_in_avail']+
  '</td><td>'+data['files_out_avail']+
  '</td><td>'+data['files_xfer_avail']+
  '</td></tr>');
     }
    });
  });

  $(document).on('click','img.deleteQuotalimit', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     result = "Quota limit #" + id + " has been removed.";

    $.ajax({
     url: '/quotalimits/delete/',
     data: "quotalimitid="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

  $(document).on('click','.saveQuotalimit', function(event){
    var table = $('#table'),
     form = $(this).parent().parent().parent(),
     send = '';
     form.children().find('input').each(function(){
        send += $(this).prop('name')+'='+$(this).val()+'&';
    });
     alert(send);
     $.ajax({
     url: '/quotalimits/save/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(){
      alert(result);
     }
    });
  });

  // QuotaTally functions
  $(document).on('click','img.deleteQuotatally', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     result = "Quota tally #" + id + " has been removed.";

    $.ajax({
     url: '/quotatallies/delete/',
     data: "quotatallyid="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

});
