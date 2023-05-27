$(document).ready(function () {
  //ajax call form Already Exist Email Verification

  $("#stuemail").on("keypress blur", function () {
    var reg =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    var stuemail = $("#stuemail").val();
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      data: {
        checkemail: "checkemail",
        stuemail: stuemail,
      },
      success: function (data) {
        if (data != 0) {
          $("#statusMsg2").html(
            '<small style="color:white; background: var(--color-bg1); padding:.3rem">Email Already Exists!</small>'
          );
          $("#Rsignup").attr("disabled", true);
        } else if (data == 0 && reg.test(stuemail)) {
          $("#statusMsg2").html(
            '<small style="color:var(--color-white); background:var(--color-success); padding:.3rem">There You go!</small>'
          );
          $("#Rsignup").attr("disabled", false);
        }
        if (stuemail == "") {
          $("#statusMsg2").html(
            '<small style="color:white; background: red; padding:.3rem">Please Enter Email!</small>'
          );
        }
      },
    });
  });
});

function addStu() {
  var reg =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  var stuname = $("#stuname").val();
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();

  //Checking form fields on form submisstion

  if (stuname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color:var(--color-white)">Please Enter Full Name</small>'
    );
    $("stuname").focus();
    return false;
  } else if (stuemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color:var(--color-white)">Please Enter Email</small>'
    );
    $("stuemail").focus();
    return false;
  } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
    $("#statusMsg2").html(
      '<small style ="color:var(--color-white);">Enter valid Email e.g., example@gmail.com</small>'
    );
  } else if (stupass.trim() == "") {
    $("#statusMsg3").html(
      '<small style="color:var(--color-white)">Please Enter Password</small>'
    );
    $("stupass").focus();
    return false;
  } else {
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass,
      },
      success: function (data) {
        // console.log(data);
        if (data == "OK") {
          $("#successMsg").html(
            "<span> Registration Successful! Please Log in.</span>"
          );
          clearStuRegField();
        } else if (data == "Failed") {
          $("#successMsg").html("<span>Unable to Register</span>");
        }
      },
    });
  }
}

//Empty All fields of form after sign up
function clearStuRegField() {
  $("#stuRegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
}
// Ajax Call for student Login verification

function checkStuLogin() {
  // console.log("Login Clicked");
  var stuLemail = $("#stuLemail").val();
  var stuLpass = $("#stuLpass").val();
  $.ajax({
    url: "Student/loginVerification.php",
    method: "POST",
    data: {
      checkLogemail: "checkLogemail",
      stuLemail: stuLemail,
      stuLpass: stuLpass,
    },
    success: function (data) {
      console.log(data);
      // console.log(data);
      if (data == 0) {
        $("#statusLogMsg").html(
          '<small style="color:white;background: red; padding:.3rem"> Invalid Email Id or Password! </small>'
        );
        clearstuLogField();
      } else if (data == 1) {
        $("#statusLogMsg").html(
          // '<small style="color:white;background: var(--color-bg1); padding:.3rem"> Login Successfull! </small>'
          '<small <div class="loading"></div> </small>'
        );
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    },
  });
}
function clearstuLogField() {
  $("#stuLogForm").trigger("reset");
  setTimeout(() => {
    $("#statusLogMsg").html("");
  }, 1000);
  // $("#statusLogMsg").html("");
}
