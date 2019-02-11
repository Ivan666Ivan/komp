<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Привет</title>
		<script>
			var text_box = "";
			var text = "";
			var arr = [];
			while (true) {
				function top() {
						var but = document.getElementById("button").value;
						document.getElementById("box").value = but;
						var check = document.getElementById("box").value;
						if (check == "start") {
							document.getElementById("box").value = "pause";
							var data = Date.now();
							var name = document.getElementById("name").value;
							var msg = document.getElementById("msg").value;
							text = data + "→" + name + "→" + msg + "→" + text;
							return text;
						}
						else {
							return "stop";
						}
				}
				var r = top();
				if (r != "stop") {
					arr = r.split("→");
					for (var i = 0; i < (arr.length-3); i++) {
						text_box = "-----------\n" + arr[(i * 3)] + "\n" + arr[(i * 3) + 1] + "	Его(ее) комментарий: " + arr[(i * 3) + 2] + "-----------\n";
					}
					document.getElementById("for-word").innerHTML = text_box;
					continue;
				}
				else {
					break;
				}
			}
		</script>
<style>
div{
  width:45%;
  float:left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding:5px 0 5px 0;
  border:1px solid gray;
}
</style>
	</head>
	<body>
		<form name="form1" method="POST">
			<input type="text" id="name" name="n" /><br />
			<textarea id="msg" name="msg" ></textarea>
			<input type="checkbox" id="box" value="start" />
			<input type="submit" id="button" value="start" onclick="top()" />
		</form>
		<div id="for-word">
<?php
$db = mysql_connect("localhost","root","");
mysql_query("SET NAMES utf8");
$commands = file_get_contents("database.sql");
$name = $_POST["n"];
$msg = $_POST["msg"];
$date = date("Y.j.d G:i:s");
$d = mysql_query($commands);
mysql_select_db("MSG_MEN",$db);
$i = mysql_query("INSERT INTO msg (Name,MSG,Date) VALUES ('$name','$msg','$date');");
if($i||$d){
echo "Успешно записано в базу данных!";
}
else{
echo "Ошибка: ".mysql_error();
}
?>
		</div>
	</body>
</html>