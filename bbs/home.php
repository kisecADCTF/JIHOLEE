<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

function ShowBoards($permission)
{
    include('../utils/connect.php');
    $query = 'SELECT * FROM board ORDER BY board_ID';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $i = 0;
    while ($row = mysqli_fetch_array($result))
    {
        $i++;
        $board_ID = $row['board_ID'];
        $board_name = $row['board_name'];
        $board_link = "<a href='board.php?board_ID=$board_ID'>$board_name</a>";
        $control = '';
        if ($permission >= PERM_ADMINISTRATOR)
            $control = "<button style=\"float:right\" class=\"btn btn-sm btn-danger\" onClick=\"ConfirmDelete($board_ID, '$board_name')\">Delete</button>";
        echo <<< EOT
		<p><h4>
				$i. $board_link
				$control
		</h4></p>	
EOT;
    }

    if ($permission >= PERM_ADMINISTRATOR)
        echo <<< EOT
		
		<script>
		function ConfirmDelete(board_ID, board_name)
		{
			if (confirm("Do you really want to delete board '" + board_name + "'?"))
				window.location.href = "del_board.php?board_ID=" + board_ID;
		}
		
		function InputCheck()
		{
			board_name = document.getElementById("board_name");
			if (!board_name.value)
			{
				alert("Board name should not be empty.");
				board_name.focus();
				return false;
			}
			return true;
		}
		</script>
EOT;
}

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
    <h1 class="page-title">Boards</h1>
    <?php ShowBoards($_SESSION['default_permission']); ?>
    <footer class="footer">
        Designed by Kisec
    </footer>
</div>
</body>
</html>
