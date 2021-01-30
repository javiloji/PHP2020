
<?php

require_once "vendor/autoload.php";

// include "datos/datos.php";

use App\Models\Blog;

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


if(isset($_POST["annadir"])){
    if(!empty($_POST)){
        $blog = new Blog();
        $blog->title = $_POST["title"];
        $blog->blog = $_POST["description"];
        $blog->tags = $_POST["tags"];
        $blog->author = $_POST["author"];
        $blog->save();
    }
}

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

            <h2> Add Blog</a></h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="text-align: center">
            <?php

                echo "<input type='text' name='title'  placeholder='Title'>";
                ?><span style="color:red;"></span><br><br><?php
                echo "<textarea name='description' placeholder = 'Description'></textarea>";
                ?><span style="color:red;"></span><br><br>
                <?php
                echo "<input type='text' name='tags'  placeholder='Tags'>";
                ?><span style="color:red;"></span><br><br>
                <?php
                echo "<input type='text' name='author'  placeholder='Author'>";
                ?><span style="color:red;"></span><br><br>
                <?php
                echo "<input type='submit' name='annadir' value='Añadir' /><br>";
            ?>
        </form>

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
                        
                        <p class="small"><span class="highlight"><?php echo $comment->getUser() ?></span> commented on
                            <a href="#"><?php echo $comment->getBlog()->getTitle() ?></a>
                        </p>

                   
                    </header>
                    <p><?php echo $comment->getComment() ?></p>

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