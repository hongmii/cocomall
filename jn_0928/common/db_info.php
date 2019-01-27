<?
    // //DBMS에 연결
    // $conn = mysql_connect("localhost","webmaker","sm1015");
    // //한글
    // mysql_query("set names utf8");
    // //use zdb
    // mysql_select_db("webmaker");




    //DBMS에 연결
    $conn = mysql_connect("localhost","root","kmj");
    //한글
    mysql_query("set names utf8");
    //use zdb
    mysql_select_db("mydb"); 
?>