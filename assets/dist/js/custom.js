// Validation To Add User.
$(document).ready(function () {
    $('#val_user').validate({
      rules: {
          usertype: {
          required: true,
        },
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        password2: {
          required: true,
          equalTo: '#password'
        }
      },
      messages: {
          usertype: {
          required: "Please select user role ",
        },
        name: {
          required: "Please select user name ",
        },
        email: {
          required: "Please enter a email address",
          email: "Please enter a <em>vaild</em> email address",
        },
        password: {
          required: "Please enter password",
          minlength: "Password will be minimum 6 characters or numbers",
        },
        password2: {
          required: "Please enter confirm password",
          equalTo: "Confirm password dos't match",
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
});
  //validate edit profile From.
$(document).ready(function () {
    $('#val_profile').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
        },
        address: {
          required: true,
        },
        gender: {
          required: true,
        }
      },
      messages: {
        name: {
          required: "Please select user name ",
        },
        email: {
          required: "Please enter a email address",
          email: "Please enter a <em>vaild</em> email address",
        },
        phone: {
          required: "Please enter Phone Number",
        },
        address: {
          required: "Please enter Address",
        },
        gender: {
          required: "Please Select Gender",
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
});
//validate Change Password From.
$(document).ready(function () {
  $('#valChangePass').validate({
    rules: {
      old_password: {
        required: true,
      },
      new_password: {
        required: true,
        minlength: 6
      },
      confm_password: {
        required: true,
        equalTo: '#new_password'
      }
    },
    messages: {
      old_password: {
        required: "Please Enter Old Password",
      },
      new_password: {
        required: "Please Enter New password",
        minlength: "Password will be minimum 6 characters or numbers",
      },
      confm_password: {
        required: "Please Enter Confirm password",
        equalTo: "Confirm password dos't match",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});