
<?php

include "datos/datos.php";

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
                        if($key == $_GET["id"]){
                ?>


                <div class="date">
                    <time datetime=" "> </time>
                </div>
                <header>
                    <h2><a href="#"> <?php  echo $blog->getTitle(); ?> </a></h2>
                </header>
                <img src="img/<?php echo $blog->getImage()?>" />
                <div class="snippet">
                    <p> <?php echo $blog->getBlog()?> </p>
                    <p class="continue"><a href="#">Continue reading...</a></p>
                </div>
                <footer class="meta">
                    <p>Comments: <a href="#"> Numero comentarios </a></p>
                    <p>Posted by <span class="highlight"><?php echo $blog->getAuthor()?></span> at 07:06PM</p>
                    <p>Tags: <span class="highlight"><?php echo $blog->getTags()?></span></p>
                </footer>

                <?php
                        }
                    }
                ?>

            </article>

            <?php

                

                // Fecha: 

                // " . date_format($value->getCreated(), 'd-m-Y') . "

                echo "<h2 style = 'color: black; background-color: #EFEEEE; padding: 10px; margin: 10px 0px;'>Comments</h2>";

                foreach ($blogs[$_GET["id"]]->comments as $key => $value) {
                    echo "<article class=\"comments\">";
                    
                    echo "<div style = 'background-color: #EFEEEE; padding: 10px; margin: 10px 0px;' class=\"comments\">";
                    echo "<p><span class=\"highlight\">" . $value->getUser() . "</span> commented </p>";
                    echo "<p>" . $value->getComment() . "</p>";
                    echo "</div>";
                    echo "</article>";
                }

            ?>

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