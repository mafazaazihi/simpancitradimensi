(function($) {
  'use strict';
  $(function() {
    const cururl=window.location,
    proto= cururl.protocol,
    host=cururl.hostname,
    pathx=cururl.pathname,
    urlx= new URL(proto+'//'+host+'/simpancitradimensi/');
    $('#table1').DataTable({
    responsive: true,
    layout: {
      top1: 'searchBuilder',
      targets:[2],
      sType:'date-YY-mm-dd'
    },
    searchPanes: false,
    bLengthChange: false,
    bInfo: false,
  });
    $('#table2').DataTable({
    responsive: true,
    layout: {
      top1: 'searchBuilder'
    },
    searchPanes: false,
    bLengthChange: false,
    bInfo: false

  });
  $('#tasktable').DataTable({
    responsive: true,
    layout: {
      top1: 'searchBuilder'
    },
    searchPanes: false,
    bLengthChange: false,
    bInfo: false

  });
  $(document).ready(function() {
    $('#editModal').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id');
      var sap = $(event.target).closest('tr').find('td:eq( 0 )').text();
      document.getElementById('menuid').value = getid;
      document.getElementById('emenuname').value = sap;
    });
  });
  $(document).ready(function() {
    $('#editModal2').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id'),
        url = $(event.target).closest('tr').find('td:eq( 2 )').text(),
        sap = $(event.target).closest('tr').find('td:eq( 0 )').text();
      document.getElementById('submenuid').value = getid;
      document.getElementById('esubmenu').value = sap;
      document.getElementById('eurl').value = url;
    });
  });
  $(document).ready(function() {
    $('#roleeditModal').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id'),
        sap = $(event.target).closest('tr').find('td:eq( 0 )').text(),
        def = $(event.target).closest('tr').find('td:eq(1)').text();
      document.getElementById('roleid').value = getid;
      document.getElementById('erole').value = sap;
      document.getElementById('edefpage').value = def;
    });
  });
  $(document).ready(function() {
    $('#editsupModal').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id');
      $.ajax({
        url: 'supplier',
        type: 'post',
        data: {
          supplieridx: getid
        },
        success: function(data) {
          var obj = JSON.parse(data);
          if (data != null) {
            document.getElementById('esupid').value = getid;
            document.getElementById('esupname').value = obj.Namesupplier
            document.getElementById('efax').value = obj.Fax
            document.getElementById('epic').value = obj.Pic
            document.getElementById('eaddr').value = obj.Address
            document.getElementById('ephone').value = obj.Telepone
            document.getElementById('eemail').value = obj.Mail
          }
        },
        error: function() {

        }
      })

    });
  });
   $(document).ready(function() {
    $('#rpassModal').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id');
      document.getElementById('ruserid').value = getid;
    });
  });
  $(document).ready(function(){
    $('#detailpartModal').on('show.bs.modal',function(){
      var partid=$(event.target).closest('tr').attr('id');
      $.ajax({
        url:urlx+'ajax/getpartdetail',
        type:'post',
        data:{
          partid:partid
        },
        success:function(data){
          var obj=JSON.parse(data);
          if(data !=null){
            document.getElementById('partid').value=obj.Partid;
            document.getElementById('partname').value=obj.Partname;
            document.getElementById('addr').value=obj.Address_id;
            document.getElementById('supp').value=obj.Supplier_id;
            document.getElementById('minqty').value=obj.Minqty;
          }
        }
      })
    })
  });
  $('.access').on('click', function() {
    const roleid = $(this).data('x'),
      menuid = $(this).data('y'),
      used = $(this).data('m');
    $.ajax({
      url: urlx+'ajax/changeaccs',
      type: 'post',
      data: {
        roleid: roleid,
        menuid: menuid,
        used: used
      },
      success: function() {
        document.location.reload()
      },
      error: function() {

      }
    })
  });
  $('.obsolete').on('click', function(){
    const part=$(this).data('x');
    $.ajax({
      url:urlx+'ajax/obsolete',
      type:'post',
      data:{
        partid:part
      },
      success:function()
      {
        Swal.fire({
        text: "Obsolete status for "+part+" chaged",
        icon: "success"
      });
      }
    })
  });
  $('#approvewo').on('click',function(){
    var taskid=$('#woapprove').val();
    $.ajax({
      type:'post',
      url:urlx+'ajax/approvewo',
      data:{
        taskid:taskid
      },
      success:function(){
        Swal.fire({
          text: "Approved successfully",
          icon: "success"
        }).then(()=>{
          location.reload()
        })
      }
    })
  });
  $('.engpm').on('change',function(){
    var taskid=$('#taskid').val(),
        eng=$('#engpm').val();
    $.ajax({
      url:urlx+'ajax/assigntask',
      type:'post',
      data:{
        taskid:taskid,
        eng:eng
      },
      success:function(){
        Swal.fire({
          text: "Engineer saved",
          icon: "success"
        });
      },
      error:function(){
        Swal.fire({
          text: "Please try again something went wrong",
          icon: "warning"
        });
      }
    })
  });
  $('.spvpm').on('change',function(){
    var taskid=$('#taskid').val(),
        eng=$('#spvpm').val();
    $.ajax({
      url:urlx+'ajax/assigntask',
      type:'post',
      data:{
        taskid:taskid,
        spv:eng
      },
      success:function(){
        Swal.fire({
          text: "Engineer saved",
          icon: "success"
        });
      },
      error:function(){
        Swal.fire({
          text: "Please try again something went wrong",
          icon: "warning"
        });
      }
    })
  });
  $('#cpassword').on('keyup',function(){
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("cpassword").value;
    let match = true;
    if (pass1 == pass2) {
      //alert("Passwords Do not match");
      document.getElementById("password").style.borderColor = "#36DD26";
      document.getElementById("cpassword").style.borderColor = "#36DD26";
      $('#alert').html('<p class="text-success"><strong>Password match</strong></p>')
      match = false;
    } else {
      document.getElementById("password").style.borderColor = "#E4080A";
      document.getElementById("cpassword").style.borderColor = "#E4080A";
      $('#alert').html('<p class="text-danger"><strong>Password not match</strong></p>')
    }
    return match;
  });
  $(document).ready(function(){
    $('#pictureModal').on('show.bs.modal',function(){
      var  partid=$(event.target).closest('tr').attr('id');
      const img = document.createElement('img'),
            urlimage=partid;
      img.src = urlimage;
      img.alt = 'Loaded Image';
      img.style.maxWidth = '100%';
      const container = document.getElementById('imageContainer');
      container.innerHTML = ''; // Clear previous image
      container.appendChild(img);
      console.log(partid);
    })
  });
  $('#rcpassword').on('keyup',function(){
    let pass1 = document.getElementById("rpassword").value;
    let pass2 = document.getElementById("rcpassword").value;
    let match = true;
    if (pass1 == pass2) {
      //alert("Passwords Do not match");
      document.getElementById("rpassword").style.borderColor = "#36DD26";
      document.getElementById("rcpassword").style.borderColor = "#36DD26";
      $('#ralert').html('<p class="text-success"><strong>Password match</strong></p>')
      match = false;
    } else {
      document.getElementById("rpassword").style.borderColor = "#E4080A";
      document.getElementById("rcpassword").style.borderColor = "#E4080A";
      $('#ralert').html('<p class="text-danger"><strong>Password not match</strong></p>')
    }
    return match;
  });

  $(document).ready(function() {
    $('#supdetailModal').on('show.bs.modal', function() {
      var getid = $(event.target).closest('tr').attr('id');
      $.ajax({
        url: urlx+'managements/supplier',
        type: 'post',
        data: {
          supplieridx: getid
        },
        success: function(data) {
          var obj = JSON.parse(data);
          if (data != null) {
            document.getElementById('nsup').value = obj.Namesupplier
            document.getElementById('nfax').value = obj.Fax
            document.getElementById('npic').value = obj.Pic
            document.getElementById('naddr').value = obj.Address
            document.getElementById('nphone').value = obj.Telepone
            document.getElementById('nmail').value = obj.Mail
          }
        },
        error: function() {

        }
      })

    });
  });
  $(document).ready(function(){
    $('#detaileqModal').on('show.bs.modal',function(){
        var getid = $(event.target).closest('tr').attr('id');
      $.ajax({
        url: urlx+'managements/equipment',
        type: 'post',
        data: {
          equipmetdidx: getid
        },
        success: function(data) {
          var obj = JSON.parse(data);
          if (data != null) {
            document.getElementById('eequipmentid').value = getid
            document.getElementById('essubloc').value = obj.Sublocation_id
            document.getElementById('essupl').value = obj.supplier_id
            document.getElementById('eserial').value = obj.Serialnumber
            document.getElementById('emachine').value = obj.Equipmentname
          }
        },
        error: function() {

        }
      })
    })
  });
  $(document).ready(function(){
    $('#detailcheckModal').on('show.bs.modal',function(){
        var getid = $(event.target).closest('tr').attr('id');
      $.ajax({
        url: urlx+'managements/checklist',
        type: 'post',
        data: {
          checkidx: getid
        },
        success: function(data) {
          var obj = JSON.parse(data);
          if (data != null) {
            document.getElementById('typeid').value = obj.Typeid
            document.getElementById('echecklist').value = obj.Typename
            document.getElementById('eequip').value = obj.Equipment_id
            document.getElementById('eperiod').value = obj.Period_id
          }
        },
        error: function() {

        }
      })
    })
  });
  $(document).ready(function(){
    $('#detailwoModal').on('show.bs.modal',function(){
      var taskid=$(event.target).closest('tr').attr('id');
      document.getElementById('etaskid').value=taskid;
      $.ajax({
        url:urlx+'ajax/gettaskdetail',
        type:'post',
        data:{
          task:taskid
        },
        success:function(data){
          var obj=JSON.parse(data);
          if(data!==null)
            {
              document.getElementById('eequip').value=obj.Serialnumber;
              document.getElementById('ettype').value=obj.Maintcategoryid;
          }
        }
      })
    })
  });
  $(document).ready(function(){
    $('#requestModal').on('show.bs.modal',function(){
      var req=$(event.target).closest('tr').attr('id');
      $.ajax({
        url:urlx+'ajax/getpartdetail',
        type:'post',
        data:{
          req:req
        },
        success:function(data){
          var obj=JSON.parse(data);
          if(data!==null)
          {
            document.getElementById('usageid').value=req;
            document.getElementById('rpartid').value=obj.Partid
            document.getElementById('rrequest').value=obj.Pickuppart
            document.getElementById('rpartname').value=obj.Partname
            document.getElementById('raddr').value=obj.Addr
            document.getElementById('rqtyl').value=obj.Quantity
            document.getElementById('total').value=parseInt(obj.Quantity)+parseInt(obj.Currq)
          }
        }
      })
    })
  });
  $(document).ready(function(){
    $('#reject').one('click',function(e){
      var reqid=$(event.target).closest('tr').attr('id'),
          cuurq=$('#total').val(),
          qty=$('#rqtyl').val(),
          partid=$('#rpartid').val();
          console.log($('#rquest').val());
      $.ajax({
        url:urlx+'ajax/rejectpart',
        type:'post',
        data:{
          reqidx:$('#usageid').val(),
          cuurq:cuurq,
          partid:partid,
          qty:qty
        },
        success:function(){
         Swal.fire({
          text: "Rejected successfully",
          icon: "success"
        },
          function(){
            location.href(urlx+'managements/sparepart');
          });
        }
      })
    })
  });
  $(document).ready(function(){
    $('#approve').one('click',function(){
      $.ajax({
        url:urlx+'ajax/rejectpart',
        type:'post',
        data:{
          approve:$('#usageid').val()
        },
        success:function(){
          Swal.fire({
            text:'Approved successfully',
            icon:'success'
          },
        function(){
          location.href(urlx+'managements/sparepart')
        })
        }
      })
    })
  });
  $(document).ready(function(){
    $('#partnu').on('keyup',function(){
      var part=$('#partnu').val();
      $.ajax({
        url:urlx+'ajax/getpart',
        type:'post',
        data:{
          partx:part
        },
        success:function(data){
          var obj=JSON.parse(data);
            document.getElementById('desc').value=obj.Partname
            document.getElementById('stock').value=obj.Quantity
            document.getElementById('getpn').value=obj.Partid
            $('#qty').attr('max',obj.Quantity);
            $('#pnumber').html('<p class="text-muted">'+obj.Partid+'</p>');
        }
      })
    })
  });
  $(document).ready(function(){
    $('#qty').on('keyup',function(){
      var stock=$('#stock').val(),
      qty=$('#qty').val();
      document.getElementById('stockaf').value=stock-qty;
    })
  })
   $(document).ready(function() {

        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input class="form-control form-control-sm type="text" name="check[]" class="input-text" id="check[]" placeholder="Enter Checklist"></td><td><input class="form-control form-control-sm type="text" name="recomended[]" class="input-text" id="recomended[]" placeholder="Enter recomended"></td><td><input class="form-control form-control-sm" type="text" name="part[]" class="input-text" id="part[]" placeholder="Part recomended"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove btn-sm"  title="Remove">x</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
  $(document).ready(function(){
    $('#detailitmModal').on('show.bs.modal',function(){
      var check=$(event.target).closest('tr').find('td:eq(0)').text(),
      reco=$(event.target).closest('tr').find('td:eq(1)').text(),
      part=$(event.target).closest('tr').find('td:eq(2)').text(),
      id=$(event.target).closest('tr').attr('id');
      document.getElementById('echeck').value=check;
      document.getElementById('checkid').value=id;
      document.getElementById('erecomended').value=reco;
      document.getElementById('epartrecom').value=part;
    })
  });
  $(document).ready(function(){
    $('#perioddtModal').on('show.bs.modal',function(){
      var getid = $(event.target).closest('tr').attr('id'),
      sap = $(event.target).closest('tr').find('td:eq( 0 )').text(),
      edays = $(event.target).closest('tr').find('td:eq( 1 )').text();
      document.getElementById('periodid').value=getid;
      document.getElementById('eperiodname').value=sap;
      document.getElementById('edays').value=edays;
    })
  });
  $(document).ready(function(){
    $('#buttonedit').on('click',function(){
        $('.form-control').attr('readonly',false);
        $('.form-select').attr('disabled',false);
    })
  });
  $(document).ready(function(){
    $('#buttonedit2').on('click',function(){
        $('.form-control').attr('readonly',false);
        $('.form-select').attr('disabled',false);
    })
  });
  $(document).ready(function(){
    $('#buttonedit3').on('click',function(){
        $('.form-control').attr('readonly',false);
        $('.form-select').attr('disabled',false);
    })
  });
  $(document).ready(function(){
    $('#buttonedit').on('click',function(){
        $('#eserial').attr('readonly',false);
        $('#emachine').attr('readonly',false);
    })
  });
    $('#table3').DataTable({
    responsive: true,
    layout: {
      top1: 'searchBuilder'
    },
    searchPanes: false,
    bLengthChange: false,
    bInfo: false

  });

  $('#parttable').DataTable({
    responsive:true,
    searchPanes:false,
    bLengthChange:false,
    bInfo:false,
    dom:'lrt'
  })
  $(document).ready(function(){
    $('.date').datepicker({
      dateFormat:'yy-mm-dd',
      numberOfMonths: 2,
      showButtonPanel: true,
      showOtherMonths: true,
      selectOtherMonths: true,
      showAnim:'clip'
    });
  });
  $(document).ready(function (){
    $('#equip').on('change',function(){
      var sn=$('#equip').val();
    $.ajax({
            type: "post",
            url: urlx+'ajax/getmachinesn',
            data: {
                serial: sn
            },
            success: function(data) {
                var hasil = data,
                    obj = JSON.parse(hasil);
                if (hasil != null) {
                    $('#machine').html('<p class="text-info"><strong>'+'Location: '+obj.Name+', Equipment: '+obj.Equipmentname+'</strong></p>')
                  } else {
                    $('#machine').html('<p class="text-info"><strong>Not found</strong></p>')
                }
            }
        })
    })
  });
  $(document).ready(function(){
    $('#period').on('change',function(){
      $.ajax({
        type:'post',
        url:urlx+'ajax/getchecklist',
        async: false,
        dataType: 'json',
        data:{
          serial:$('#equip').val(),
          period:$('#period').val()
        },
        success:function(data){
          var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[0].Typeid + '>' + data[0].Typename + '</option>';
                }
                $('#checklist').html(html);
        }
      })
    })
  });
    

  $(document).ready(function() {
        $("#equip").autocomplete({
            appendTo: "#newtaskModal",
            source: function(request, response) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: urlx+'ajax/machine',
                    data: {
                        query: $("#equip").val()
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },

        });
    });
  $(document).ready(function(){
    $('#partidl').autocomplete({
      appendTo:"#newstockModal",
      source:function(request,response){
        $.ajax({
          type:'post',
          dataType:'json',
          url:urlx+'ajax/getpartlike',
          data:{
            pn:$('#partidl').val()
          },
          success:function(data){
            if(data)
            {
              response(data);
            }
          }
        })
      }
    })
  });
  $(document).ready(function(){
    $('#qtyl').on('keyup',function(){
      $.ajax({
        url:urlx+'ajax/getpartdetail',
        type:'post',
        data:{
          partid:$('#partidl').val()
        },
        success:function(data){
          var obj=JSON.parse(data);
          let qtyres=null;
          if(obj===null)
          {
              var qty=$('#qtyl').val(),
              currqty= parseInt(qty);//+parseInt(obj.Quantity);
             
               document.getElementById('currstkl').value=currqty;
               console.log();
          } else{
               var qty=$('#qtyl').val(),
                currqty= parseInt(qty)+parseInt(obj.Quantity);
             
               document.getElementById('currstkl').value=currqty;
               console.log(currqty);
            console.log(obj.Quantity);
          }
        }
      })
    })
  });
  $(document).ready(function(){
    $('.calendar').datepicker({
      dateFormat:'yy-mm-dd',
      numberOfMonths: 1,
      showButtonPanel: true,
      showOtherMonths: true,
      selectOtherMonths: true,
      showAnim:'clip',
      backgroundColor:'#fff'
    })
  });
  $('#start').on('change',function(){
    let start=$('#start').val(),
    id=$('#taskid').val();
    $.ajax({
      url:urlx+'ajax/updatetime',
      type:'post',
      data:{
        start:start,
        taskid:id
      },
      success:function(){
       Swal.fire({
          text: "Start time saved",
          icon: "success"
        });
      }
    })
    console.log(start)
  });
  $('#end').on('change',function(){
    let start=$('#end').val(),
    id=$('#taskid').val();
    $.ajax({
      url:urlx+'ajax/updatetime',
      type:'post',
      data:{
        end:start,
        taskid:id
      },
      success:function(){
       Swal.fire({
          text: "end time saved",
          icon: "success"
        });
      }
    })
    console.log(start)
  });

   $(document).ready(function() {
            $('#save').one('click', function(e) {
                e.preventDefault();
                var $fields = [$('tr.entrytable input')];
                var $emptyFields;
                const table=document.getElementById('tbl');

                for (var i = 0; i < $fields.length; i++) {
                    $emptyFields = $fields[i].filter(function(i, element) {
                        return $.trim($(this).val()) === '';
                    });
                }
                if (!$emptyFields.length) {
                    var actual = $('#actual').val(),
                        comment = $('#note').val(),
                        taskid = $('#taskid').val();

                    if (actual != "" && comment != "") {

                        var myRows = {};
                        var headersText = [];
                        var $headers = table.querySelectorAll('thead th');

                        // Loop through grabbing everything
                        var $rows = $("#tbl tr").each(function(index) {
                            const $cells = $(this).find("td");
                            myRows[index] = {};

                            $cells.each(function(cellIndex) {
                                // Set the header text
                                if (headersText[cellIndex] === undefined) {
                                    headersText[cellIndex] = $($headers[cellIndex]).text();
                                }
                                // Update the row object with the header/cell combo
                                const text = $(this).text();
                                if (text) {
                                    myRows[index][headersText[cellIndex]] = text;
                                } else {
                                    const input = $(this).find('input');
                                    if (input.is(":checkbox")) {
                                        myRows[index][headersText[cellIndex]] = +input.prop('checked');
                                    } else {
                                        myRows[index][headersText[cellIndex]] = input.val();
                                    }
                                }
                            });
                        });
                        $.ajax({
                            // async: true,
                            url: urlx+'ajax/entry',
                            type: 'POST',
                            data: JSON.stringify(myRows),
                            contentType: 'application/json',
                            // dataType: 'json',
                            success: function() {
                                $.ajax({
                                    url: urlx+'ajax/updatetime',
                                    type: "post",
                                    data: {
                                        taskid: taskid,
                                        comment: comment
                                    },
                                    success: function() {
                                        Swal.fire({
                                          text:'Report created and saved',
                                          icon:'success'
                                        }),
                                        document.location.href = urlx+'managements/workorder';
                                    },
                                    error: function() {
                                        alert('Error eror', Response);

                                    }
                                });
                            },
                            error: function(xhr) {
                                console.log(xhr.responseJSON);
                                alert(Response);
                            }
                        });
                    } else {
                        if (starttime == "") {
                            Swal.fire({
                              text:'Start time is empty!',
                              icon:'warning'
                            })
                        } else if (endtime == "") {
                            Swal.fire({
                              text:'End time is empty!',
                              icon:'warning'
                            })
                        } else if (actual == "") {
                            Swal.fire({
                              text:'Actual time is empty!',
                              icon:'warning'
                            })
                        } else if (comment == "") {
                            Swal.fire({
                              text:'Note time is empty!',
                              icon:'warning'
                            })
                        } else if ($emptyFields.length) {
                            Swal.fire({
                              text:'Unable to save the report please fill it correctly!',
                              icon:'warning'
                            })
                        } else if (starttime > endtime) {
                            Swal.fire({
                              text:'Start time and end time is incorrect!',
                              icon:'warning'
                            })
                        }
                    }

                } else {
                    Swal.fire({
                              text:'Unable to save the report please fill it correctly!',
                              icon:'warning'
                            })
                }
                return false;
            });
        });

  });
})(jQuery);