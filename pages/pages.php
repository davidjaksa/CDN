<div class="container">
<?php
$posts = getPosts();

foreach ($posts as $post) {
    echo '
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <h3>' . $post['title'] . '</h3>
            <a class="btn btn-primary" href="' . $post['filename'] . '">Open post <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>

    <hr>
    ';}

?>
</div>
<!--         <div class="row text-center">

            <div class="col-lg-12">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a>
                    </li>
                    <li class="active"><a href="#">1</a>
                    </li>
                    <li><a href="#">2</a>
                    </li>
                    <li><a href="#">3</a>
                    </li>
                    <li><a href="#">4</a>
                    </li>
                    <li><a href="#">5</a>
                    </li>
                    <li><a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>

        </div> -->