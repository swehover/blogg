<?php 
include_once('resources/init.php');
$posts = get_posts((isset($_GET['id']) ? $_GET['id'] : null));

?>

<?php
session_start(); // Must start session first thing
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
// See if they are a logged in member by checking Session data
$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
	$toplinks = '<a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Account</a> &bull; 
	<a href="logout.php">Log Out</a>';
} else {
	$toplinks = '<a href="join_form.php">Register</a> &bull; <a href="login.php">Login</a>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>  
            
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px; }
            body { background: rgb(76,76,76); /* Old browsers */
background: -moz-linear-gradient(-45deg, rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(0,0,0,1) 100%, rgba(19,19,19,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(0,0,0,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(-45deg, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(0,0,0,1) 100%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(-45deg, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(0,0,0,1) 100%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(-45deg, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(0,0,0,1) 100%,rgba(19,19,19,1) 100%); /* IE10+ */
background: linear-gradient(135deg, rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(0,0,0,1) 100%,rgba(19,19,19,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */; text-align: center; text-decoration: none;}
            
            #foter {text-align: right; padding-right: 40px; background-color: lightsalmon; height: 100px;
                    opacity:0.4; background-color: lightcoral; 
             -moz-border-radius: 1em 4em 1em 4em;
             border-radius: 1em 4em 1em 4em;
            
            }
            
                        
            .post {
                
            }
            #toplink {padding-top: 20px;}
            .wrapper {}
            
            
            h1 {color: darkred; }
            
            a:link,a:visited {
	color: #03C;
        text-decoration: none;
}
            
        </style>
        <title> My Blog </title>
    </head>
    <body>
        <div id="wrapper">
            <div id="top">
                
            </div>
    <nav>
            <ul>
                <li><a href="index.php"> Index </a></li>
                <li><a href="add_post.php"> Add a Post </a></li>
                <li><a href="add_category.php"> Add a Category </a></li>
                <li><a href="category_list.php"> Category List </a></li>
            </ul>
        </nav>
        
        <h1> Hasses Blog </h1>
        
        <?php
        foreach ($posts as $post){
            
            ?>
        
        <div class="post"></div>
        <h2><a href='index.php?id=<?php echo $post['post_id'];?>'><?php echo $post['title'];?></a></h2>
        <p> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted']));?>
            in <a href='category.php?id=<?php echo $post['category_id'];?>'><?php echo $post['name'];?></a>
        </p>
        <div> <?php echo nl2br($post['contents']);?> </div>
        
        <menu>
            <ul>
                <li><a href="delete_post.php?id=<?php echo $post['post_id']; ?>">Delete This Post</a></li>
                <li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit This Post</a></li>
            </ul>
        </menu>
        
        </div>
            <?php 
        } 
        ?>
        <div id="foter">
            <div id="toplink">
            <?php
                    echo $toplinks;
            ?>
            </div>
        </div>
        
        </div>   
    </body>
</html>
