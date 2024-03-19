$(document).ready(function () {
  load_commnet();
  function load_commnet() {
    $.ajax({
      type: "POST",
      url: "code.php",
      data: {
        comment_load_data: true,
      },
      success: function (response) {
        $(".comment-container").html("");
        console.log(response);
        $.each(response, function (key, value) {
          $(".comment-container").append(
            '<div class="reply_box border p-2 mb-2">\
                                            <h6 class="border-bottom d-inline">' +
              value.user["id"] +
              ":" +
              value.cmt["commented_on"] +
              '</h6>\
                                        <p class="para">' +
              value.cmt["msg"] +
              '</p>\
                                        <button value="' +
              value.cmt["id"] +
              '" class="btn btn-warning reply_btn">Reply</button>\
                                        <button  value="' +
              value.cmt["id"] +
              '" class="btn btn-danger view_reply_btn">View replies</button>\
                                        <div class="ml-4 reply_section">\
                                        </div>\
                                         </div>\
        '
          );
        });
      },
    });
  }

  $(document).on("click", ".reply_btn", function (e) {
    var thisClick = $(this);
    var cmt_id = thisClick;

    $(".reply_section").html("");

    thisClick.closest(".reply_box").find(".reply_section").html(
      '<input type="text" class="reply_msg form-control" placeholder="Reply ">\
    <div class="text-end">\
        <button class="btn btn-sm btn-primary reply_add_btn">Reply</button>\
        <button class="btn btn-sm btn-danger reply_cancel_btn">Cancel</button>\
    </div>\
    '
    );
  });

  $(document).on("click", ".reply_cancel_btn", function (e) {
    $(".reply_section").html("");
  });

  $(document).on("click", ".reply_add_btn", function (e) {
    e.preventDefault();

    var thisClick = $(this);
    var cmt_id = thisClick.closest(".reply_box").find(".reply_btn").val();
    var reply = thisClick.closest(".reply_box").find(".reply_msg").val();

    var data = {
      comment_id: cmt_id,
      reply_msg: reply,
      add_reply: true,
    };
    $.ajax({
      type: "POST",
      url: "code.php",
      data: data,
      success: function (response) {
        alert(response);
        $(".reply_section").html("");
      },
    });
  });

  $(document).on("click", ".view_reply_btn", function (e) {
    e.preventDefault();

    var thisClick = $(this);
    var cmt_id = thisClick.val();

    $.ajax({
      type: "POST",
      url: "code.php",
      data: {
        cmt_id: cmt_id,
        view_comment_data: true,
      },
      success: function (response) {
        // console.log(response);
        $(".reply_section").html("");
        $.each(response, function (key, value) {
          thisClick
            .closest(".reply_box")
            .find(".reply_section")
            .append(
              '<div class="sub_reply_box border-bottom p-2 mb-2">\
            <h6 class="border-bottom d-inline">' +
                value.user["fullname"] +
                ":" +
                value.cmt["commented_on"] +
                '</h6>\
            <p class="para">' +
                value.cmt["reply_msg"] +
                '</p>\
            <button value="' +
                value.cmt["comment_id"] +
                '" class="btn btn-warning text-darnk sub_reply_btn">Reply</button>\
            <div class="ml-4 sub_reply_section">\
            </div>\
           </div>\
        '
            );
        });
      },
    });
  });

  $(".add_comment_btn").click(function (e) {
    e.preventDefault();

    var msg = $(".comment_textbox").val();
    if ($.trim(msg).length == 0) {
      error_msg = "Please type comment";
      $("#error_status").text(error_msg);
    } else {
      error_msg = "";
      $("#error_status").text(error_msg);
    }

    if (error_msg != "") {
      return false;
    } else {
      var data = {
        msg: msg,
        add_comment: true,
      };

      $.ajax({
        type: "POST",
        url: "code.php",
        data: data,
        success: function (response) {
          alert(response);
          $(".comment_textbox").val("");
        },
      });
    }
  });
});
