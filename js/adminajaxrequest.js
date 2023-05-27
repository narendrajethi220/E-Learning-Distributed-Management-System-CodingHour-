function checkAdminLogin() {
  // console.log("Login Clicked");
  var adminemail = $("#adminemail").val();
  var adminpass = $("#adminpass").val();
  $.ajax({
    url: "Admin/admin.php",
    method: "POST",
    data: {
      checkLogemail: "checkLogemail",
      adminemail: adminemail,
      adminpass: adminpass,
    },
    success: function (data) {
      //   console.log(data);
      // console.log(data);
      if (data == 0) {
        $("#adminStatusLogMsg").html(
          '<small style="color:white;background: red; padding:.3rem"> Invalid Email Id or Password! </small>'
        );
        clearAdminForm();
      } else if (data == 1) {
        $("#adminStatusLogMsg").html(
          // '<small style="color:white;background: var(--color-bg1); padding:.3rem"> Success Loading... </small>'
          '<small <div class="loading"></div> </small>'
        );
        setTimeout(() => {
          window.location.href = "admin/adminDashboard.php";
        }, 1000);
      }
    },
  });
}
function clearAdminForm() {
  $("#adminForm").trigger("reset");
  setTimeout(() => {
    $("#adminStatusLogMsg").html("");
  }, 1000);
}
