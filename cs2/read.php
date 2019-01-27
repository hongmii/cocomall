<html>
<head>
    <title>Document</title>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br>
<?
    include "db_info.php";

    $result = mysql_query("SELECT * FROM costumerservice WHERE id=$id", $conn);
    $row = mysql_fetch_array($result);
?>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 colspan=4 align=center bgcolor=#999999></td>
        <font color=white><b><?=$row[title]?></b></font>
    </tr>
    <tr>
        <td width=50 height=20 align=center bgcolor=$eeeeee></td>
        <td width=240 bgcolor=white><?=$row[name]?></td>
        <td width=50 height=20 align=center bgcolor=#eeeeee></td>
        <td width=240 bgcolor=white><?=$row[email]?></td>
    </tr>
    <tr>
        <td width=50 height=20 align-center bgcolor=#eeeeee></td>
        <td width= bgcolor=white><?=$row[wdate]?></td>
        <td width= height=20 align=center bgcolor=#eeeeee></td>
        <td width= bgcolor=white><?=$row[view]?></td>
    </tr>
    <tr>
        <td bgcolor=white colspan=4>
        <font color=black>
        <pre><?=$row[content]?></pre>
        </font>
        </td>
    </tr>
    <tr>
    <td colspan=4 bgcolor=#999999>
    <table width=100%>
        <tr>
            <td width=200 align=left height=20>
                <a href=list.php?no=<?=$no?>><font color=white>[목록보기]</font></a>
                <a href=write.php><font color=white>[글쓰기]</font></a>
                <a href=edit.php?id=<?=$id?>><font color=white>[수정]</font></a>
                <a href=predel.php?id=<?=$id?><font color=white>[삭게]</font></a>
            </td>
            <td align=right>
<?
    $query = mysql_query("SELECT id FROM costumerservice WHERE id > $id LIMIT1", $conn);
    $prev_id = mysql_fetch_array($query);

    if($prev_id[id]){
        echo "<a href=read.php?id=$prev_id[id]><font color=white>[이전]</font></a>";
    } else{
        echo "[이전]";
    } 

    $query = mysql_query("SELECT id FROM costumerservice WHERE id < $id ORDER BY id DESC LIMIT 1", $conn);
    $next_id = mysql_fetch_array($query);

    if ($next_id[id]) {
        echo "<a href=read.php?id$next_id[id]>
        <font color=white>[다음]</font></a>";
    } else{
        echo "[다음]";
    }
?>

            </td>
        </tr>

    </table>    
    </td>
    </tr>
</table>
<?
    $result = mysql_query("UPDATE costumerservice SET view=view+1 WHERE id=$id", $conn);

    mysql_close($conn);
?>
</center>
</body>
</html>