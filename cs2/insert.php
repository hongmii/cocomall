<?
include "db_info.php";

$query = "INSERT INTO costumerservice (name, pass, content)";
$query = "VALUES('$_POST[name]', '$_POST[pass]', '$_POST[content]')";
$result = mysql_query($query, $conn);
?>

<script>
alert("글이 등록되었습니다.");
location.href="list.php";
</script>

