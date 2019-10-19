<?php
    $post = getPost("posts/".$page[2][0].".md");
    if (!$post) {
        require('pages/404.php');
    } else {
        echo '
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <h3>'. $post["title"] .'</h3>
                    '. $post["content"] .'

                    <a class="btn btn-primary" href="/pages">Back to posts <span class="glyphicon glyphicon-chevron-left"></span></a>
                </div>
            </div>
        </div>';
    }



?>