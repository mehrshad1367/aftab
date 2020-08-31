$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//--------------------------Submit new post---------------------
function insert_record() {
  var FirstName = $('#user-register-form #firstName').val();
  var LastName = $('#user-register-form #lastName').val();
  var Department = $('#user-register-form #department').val();
  var Phone = $('#user-register-form #phone').val();

  if (FirstName == '' || LastName == '' || Department == '' || Phone == '') {
    $('#blank_message').html('Please Fill in the Blanks');
  } else {
    $.ajax({
      location: 'employees/update',
      url: 'employees/store',
      method: 'POST',
      dataType: 'json',
      data: {firstname: FirstName, lastname: LastName, department: Department, phone: Phone},
      success: function (response) {
        var tr = "<tr>";
        tr += "<td>" + response.data.id + "</td>";
        tr += "<td>" + FirstName + "</td>";
        tr += "<td>" + LastName + "</td>";
        tr += "<td>" + Department + "</td>";
        tr += "<td>" + Phone + "</td>";
        tr += "<td>" + "<button type='button' style='cursor: pointer ; color: white' data-toggle='modal' data-target='#UpdateModal' id='btn_update' class = 'btn btn-primary' onclick='update(this," + response.data.id + ")'>Edit</button>" + "</td>";
        tr += "<td>" + "<button type='button' style='cursor: pointer ; color: white' data-toggle='modal' data-target='#DeleteModal' id='btn_delete' class = 'btn btn-danger' onclick='deleteData(this," + response.data.id + ")'>Delete</button>" + "</td>";
        tr += "</tr>";
        $("#dataTable tbody").append(tr)
        // location.reload();
        $('#user-register-form').trigger("reset");
        $('#Registration').modal('hide');
      }
    })
  }
}

//--------------------------active btn--------------------------
$('#inputProfileImg').on('change',function(){
  //get the file name
  var fileName = $(this).val();
  //replace the "Choose a file" label
  $(this).next('.custom-file-label').html(fileName);
})
//as
// Add active class to the current button (highlight it)
var header = document.getElementById("myActive");
var btns = header.getElementsByClassName("nav-link");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
  });
}

//--------------------------calender--------------------------
function insert_Event(){
  var Title = $('#event-register-form #title').val();
  var Start = $('#event-register-form #start').val();
  var End = $('#event-register-form #end').val();

  if (Title =='' || Start =='' || End ==''){
    $('#blank_message').html('Please Fill in the Blanks');
  }else{
    $.ajax({
      location:'calender',
      url: 'calender/create',
      method:'Post',
      datatype:'json',
      data:{title:Title, start:Start, end:End},
      success: function (response) {

        $('#event-register-form').trigger("reset");
        $('#AddEvent').modal('hide');
      }
    })
  }
}
