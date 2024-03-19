<?php
session_start();
include 'db-connect.php';


if (isset($_POST['view_comment_data'])) {
    $cmt_id  = mysqli_real_escape_string($con, $_POST['cmt_id']);
    $query = "SELECT * FROM comment_relies WHERE comment_id = $cmt_id";
    $query_rung = mysqli_query($con, $query);

    $result_array = [];
    if (mysqli_num_rows($query_rung) > 0) {
        foreach ($query_rung as $row) {
            $user_id =  $row['user_id'];
            $user_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
            $user_query_run = mysqli_query($con, $user_query);
            $resule = mysqli_fetch_array($user_query_run);
            array_push($result_array, ['cmt' => $row, 'user' => $resule]);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo 'No reply from';
    }
}


if (isset($_POST['add_reply'])) {
    $cmt_id = mysqli_real_escape_string($con, $_POST['comment_id']);
    $reply = mysqli_real_escape_string($con, $_POST['reply_msg']);

    $user_id = $_SESSION['auth_user_id'];

    $query = "INSERT INTO comment_relies(user_id,comment_id,reply_msg) VALUES('$user_id', '$cmt_id', '$reply')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo 'Comment Replyed';
    } else {
        echo 'Somthig went wrong!';
    }
}




if (isset($_POST['comment_load_data'])) {
    $comments_query = "SELECT * FROM comments";
    $comments_query_rung = mysqli_query($con, $comments_query);

    $arrayResult = [];
    if (mysqli_num_rows($comments_query_rung) > 0) {
        foreach ($comments_query_rung as $row) {
            $user_id =  $row['user_id'];
            $user_query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
            $user_query_run = mysqli_query($con, $user_query);
            $resule = mysqli_fetch_array($user_query_run);
            array_push($arrayResult, ['cmt' => $row, 'user' => $resule]);
        }
        header('Content-type: application/json');
        echo json_encode($arrayResult);
    } else {
        echo 'Give a comment';
    }
}


if (isset($_POST['add_comment'])) {
    $msg = mysqli_real_escape_string($con, $_POST['msg']);
    $user_id =  $_SESSION['auth_user_id'];

    $comment_add_query = "INSERT INTO comments(user_id, msg)
     VALUES ('$user_id', '$msg')";
    $comment_add_query_run = mysqli_query($con, $comment_add_query);

    if ($comment_add_query_run) {
        echo 'Comment added successfully';
    } else {
        echo 'Comment not added successfully';
    }
}