<?php
$name = trim(htmlspecialchars($_POST['name']));
$phone = trim(htmlspecialchars($_POST['phone']));
$city = trim(htmlspecialchars($_POST['city']));
$server_name = $_SERVER['HTTP_HOST'];
$server_name .= $_SERVER['REQUEST_URI'];

$from = "admin@".$_SERVER['HTTP_HOST'];
$recipient = "skc-m.zimin@yandex.ru";
$mailsubject = "Заявка с сайта";

$content = '
  <b>О клиенте</b><br>
  <p>Имя: '.$name.'</p>
  <p>Телефон: '.$phone.'</p>
  <p>Город: '.$city.'</p>';

// $content .= '<p>'.$server_name.'</p>';

$mailheaders = "Content-type: text/html; charset=utf-8 \r\n";
$mailheaders .= "From: $from\r\n";
$mailheaders .= "Reply-To: $from\r\n";
mail($recipient, $mailsubject, $content, $mailheaders);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Спасибо за вашу Заявку!</title>
  <style>
    .content-wrapper{
      text-align: center;
      font-family: tahoma;
      position: fixed;
      top: 22%;
      left: 36%;
      border-radius: 11px;
      box-shadow: 0px 34px 19px 7px rgba(0, 0, 0, 0.19);
    }
    .content-title{ 
      display: block; 
      margin: 0px 0px 31px; 
      font-size: 24px; 
      background-color: orange;
      border-top-left-radius: 11px;
      border-top-right-radius: 11px;
      padding: 20px 0;
      color: #fff;
    }
    .content-body{
      display: block; 
      margin: 0px 0px 16px; 
      font-size: 20px;
      padding: 10px 30px;
    }
    .go-back{
      margin-top: 30px; 
      color: orange;
    }
    .timer{
      display: block; 
      font-size: 34px; 
      margin-top: 19px;
      padding-bottom: 20px
    }
  </style>
</head>
<body style="background: #F6F6F6;">
<div class="content-wrapper">
  <div class="content-title">Спасибо за Вашу Заявку!</div>
  <div class="content-body">Мы позвоним вам в ближайшее время</div>
    <div class="go-back">Сейчас вернем вас назад... <span id="timer" class="timer"></span>
  </div>
</div>
<script>
  window.addEventListener("load", function (){
      var timerId = document.getElementById("timer");
      var startTime = 4;
      timerId.innerHTML = startTime;
      setInterval(function (){
        startTime--;
        timerId.innerHTML = startTime;
      }, 1000);
    setTimeout(function (){
      history.back();
    }, startTime * 1000);
  });
</script>
</body>
</html>