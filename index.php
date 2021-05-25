<?php
$pdo = new PDO(
    "mysql:dbname=sample;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
// if ($pdo) {
//     echo "DB接続OK";
// } else {
//     echo "DB接続NG";
// }
$regist = $pdo->prepare("SELECT * FROM post");
$regist->execute();
// if ($regist) {
//     echo "登録成功";
// } else {
//     echo "登録失敗";
// }
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<title>Todo</title>
<h1>Todo</h1>
<section>
    <h2>新Todo</h2>
    <form action="send.php" method="post">
        実行者 : <input type="text" name="name" value=""><br>
        Todo内容: <input type="text" name="contents" value=""><br>
        <button type="submit">投稿</button>
    </form>
</section>
 
 <section>
	<h2>Todo内容一覧</h2>
		<?php foreach($regist as $loop):?>
			<div>No：<?php echo $loop['id']?></div>
			<div>名前：<?php echo $loop['name']?></div>
			<div>投稿内容：<?php echo $loop['contents']?></div>
			<div>------------------------------------------</div>
		<?php endforeach;?>
	
</section>
