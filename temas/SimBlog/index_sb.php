
<?php

require_once "vendor/autoload.php";

// include "datos/datos.php";

use App\Models\Blog;
use App\Models\Comment;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'bd_symblog',
    'username'  => 'loji',
    'password'  => 'romano',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$blogs = Blog::all();

$comments = Comment::all();

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="css/screen.css" type="text/css" rel="stylesheet" />
    <link href="css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="index_sb.php">Home</a></li>
                        <li><a href="about_sb.php">About</a></li>
                        <li><a href="contact_sb.php">Contact</a></li>
                        <li><a href="add_sb.php">Añadir Blog</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index_sb.php">symblog</a></h2>
                <h3><a href="index_sb.php">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">

            <article class="blog">

                <?php
                    foreach ($blogs as $key => $blog) {
                    
                ?>

                <div class="date">
                    <time datetime=" "> </time>
                </div>
                <header>
                <?php echo "<h2><a href='show_sb.php?id=".$key."'>";  echo $blog["title"]; echo "</a></h2>";  ?>
                </header>
                <img src="img/<?php echo $blog["image"]?>" />
                <div class="snippet">
                    <p> <?php echo $blog["blog"]?> </p>
                    <p class="continue"><a href="#">Continue reading...</a></p>
                </div>
                <footer class="meta">
                    <p>Comments: <a href="#"><?php echo $blog->numComments() ?></a></p>
                    <p>Posted by <span class="highlight"><?php echo $blog["author"]?></span> at 07:06PM</p>
                    <p>Tags: <span class="highlight"><?php echo $blog["tags"]?></span></p>
                </footer>

                <?php
                    }
                ?>

            </article>
        </section>
        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <span class="weight-1">magic</span>
                    <span class="weight-5">symblog</span>
                    <span class="weight-4">movie</span>
                </p>
            </section>
            <section class="section">
                <header>
                    <h3>Latest Comments</h3>
                </header>
                <article class="comment">
                <?php foreach($comments as $key => $comment){ ?>

                    <header>
                        
                        <p class="small"><span class="highlight"><?php echo $comment["user"] ?></span> commented on
                            <a href="#"><?php echo $comment["blog_id"]["title"] ?></a>
                        </p>

                   
                    </header>
                    <p><?php echo $comment["comment"] ?></p>

                    <?php } ?>

                </article>
            </section>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>


<?php
// // echo "añadiendo blogs y comments";

// // // $superheroe->setNombre($valorNombre);
// // //         $superheroe->setVelocidad($valorVelocidad);

// // //         $superheroe->set();

// foreach ($blogs as $key => $blog) {
//     $blog->setTitle($blog->getTitle());               
//     $blog->setsetBlogTitle($blog->getBlog());               
//     $blog->setImage($blog->getImage());               
//     $blog->setAuthor($blog->getAuthor());               
//     $blog->setTags($blog->getTags());               
//     $blog->setCreated($blog->getCreated());               
//     $blog->setUpdated($blog->getUpdated());   
    
//     if($blog->set()){
//         echo "Todo bien";
//     }else{
//         echo "Todo mal";
//     }
// }

// print_r($blog1);

// // echo $blog1->getTitle();

?>