<?php
session_start();
include "includes/header.php";
include "includes/navbar.php";

?>
<?php
if (isset($_SESSION['status'])) {
    echo '<div class="alert">"' . $_SESSION['status'] . '"</div>';
}
unset($_SESSION['status']);
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">


                    <div class="card-header">
                        <h4>This is a Blog Heading</h4>
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus debitis enim reprehenderit a.
                        Dignissimos, veniam commodi rerum facilis nam minima, quia blanditiis quod iure ipsa reiciendis
                        dolore excepturi sint nemo.
                        Quasi quaerat officia enim deleniti unde qui dolores expedita reiciendis alias libero,
                        consequuntur voluptates pariatur, nostrum distinctio eum illum modi illo autem error laborum
                        laudantium tempore vero? Reprehenderit, quia explicabo?
                        <hr>
                        <div class="main-comment">
                            <div id="error_status"></div>
                            <textarea class="comment_textbox form-control mb-2" id="" cols="30" rows="2"></textarea>
                            <button class="btn btn-primary add_comment_btn" type="button">Comment</button>

                            <hr>

                            <div class="comment-container">

                                <!-- <div class="reply_box border p-2 mb-2">
                                    <h6 class="border-bottom d-inline">Hi</h6>
                                    <p class="para">
                                        Hie Post cmt
                                    </p>
                                    <button class="btn btn-warning reply_btn">Reply</button>
                                    <button class="btn btn-danger view_reply_btn">View replies</button>
                                    <div class="ml-4 reply_section">

                                    </div>
                                </div> -->

                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>