<!DOCTYPE html>
<meta charset="UTF-8">
<title>Family Todo</title>
<h1>Family Todo</h1>
<section>
    <h2>Todo追加完了</h2>
    <button onclick="location.href='index.php'">戻る</button>
</section>
 

<?php
$id = null;
$name = $_POST["name"];
$contents = $_POST["contents"];
date_default_timezone_set('Asia/Tokyo');
$created_at = date("Y-m-d H:i:s");

$pdo = new PDO(
    "mysql:dbname=sample;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);

if ($pdo) {
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}

$regist = $pdo->prepare("INSERT INTO post(id, name, contents, created_at) VALUES (:id,:name,:contents,:created_at)");
$regist->bindParam(":id", $id);
$regist->bindParam(":name", $name);
$regist->bindParam(":contents", $contents);
$regist->bindParam(":created_at", $created_at);
$regist->execute();

if ($regist) {
    echo "登録成功";
} else {
    echo "登録失敗";
}
?>
