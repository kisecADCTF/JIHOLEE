<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

function ShowTop10($permission)
{
    include('../utils/connect.php');
    $query = "SELECT post_ID FROM top_cache ORDER BY reply_count DESC";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result))
    {
        $post_ID = $row['post_ID'];
        $query = "SELECT * FROM post WHERE post_ID = '$post_ID'";
        $result2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $post_name = mysqli_fetch_array($result2)['post_name'];
        $post_link = "<a href='post.php?post_ID=$post_ID'>$post_name</a>";
        echo <<< EOT
		<p><h5>
			$post_link
		</h5><p>
EOT;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>kisec bbs - home</title>
    <link href="../css/style.css" rel="stylesheet" />
</head>
<body>
<header class="masthead">
    <div class="container">
        <div class="masthead-logo">
            kisec bbs
        </div>
        <nav class="masthead-nav">
            <a href="home.php">Home</a>
            <a href="top_post.php">Top 10 Post</a>
            <?php ShowUserManagement($_SESSION['default_permission']); ?>
            <a href="../user/user_info.php"><?php ShowUser(); ?></a>
            <a href="../logout.php">Log out</a>
        </nav>
    </div>
</header>

<div class="container markdown-body">
    <h2>Top 10 Posts</h2>
    <?php ShowTop10($_SESSION['default_permission']); ?>
    <footer class="footer">
        Designed by Kisec
    </footer>
</div>
</body>
</html>