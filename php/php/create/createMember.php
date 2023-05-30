<?php
    include "../connect/connect.php";

    $sql = "create table member(";
    $sql .= "MemberID int(10) unsigned auto_increment,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youNick varchar(10) NOT NULL,";
    $sql .= "youID varchar(10) NOT NULL,";
    $sql .= "youPass varchar(40) NOT NULL,";
    $sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
    $sql .= "youPhone varchar(40)NOT NULL,";
    $sql .= "youAge varchar(40)NOT NULL,";
    $sql .= "youSex varchar(40)NOT NULL,";
    $sql .= "ImgSrc varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize varchar(40) DEFAULT NULL,";
    $sql .= "Regtime int(40) NOT NULL,";
    $sql .= "Modtime int(40) DEFAULT NULL,";
    $sql .= "PRIMARY KEY(MemberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create tables complete";
    } else {
        echo "create tables false";
    }
?>