<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Map&amp;PHP</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>
    #canvas{
        background-color: #333;
    }
</style>
</head>

<body>
<div class="login">
    <form name="form1" action="login_act.php" method="post">
    ID:<input type="text" name="lid" />
    PW:<input type="password" name="lpw" />
    <input type="submit" value="LOGIN" />
    </form>
</div>
<br>
<h1>Tomohide YUASA<h1>
<h1>公開メモページ</h1><br>
<h4>
[開発用]ログインのID:test1 PW:test1 （管理者1 = レベル高) を入力してください<br>
[開発用]ログインのID:test2 PW:test2 （管理人2 = レベル低）を入力してください<br>
私、Tomohide YUASAの初めての個人ページです。<br>
ここでは、最近勉強しているHTMLやCSS、Java script、PHPなどを使って作ったサイトなどを紹介します</h4>
<br>

<canvas id="canvas" width="1000" height="650"></canvas>

    <div class="wrapper0">
        <div class="main-left">
            <h3>現在ネットにアクセスしている場所</h3><br>
            <div class="display" id="myMap01"></div><br>
            <!-- <p>自分の位置：緯度は：</p><p id="view1">---</p><p> 経度は：</p><p id="view2">---</p> -->
                <button id="btnD" class="form-control1">再読み込み</button></div>

        <div class="main-right">
            <form method="post" action="insert.php">
                <fieldset>
                  <h3>保存しておきたいこと<br>(ログインしなくても登録できます)</h3><br>
                    <p>アクセス日時：</p><p id="resultAA">---</p><p id="resultAAA">---</p><br>
                    <label>メモのタイトル：<input type="text" name="name"></label><br>
                    <label>気になるURL：  <input type="text" name="email"></label><br>
                    <label>自由なコメント<br><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
                    <label>緯度(自動取得)：<input id="TOMO" value="" name="lat"></label><br>
                    <label>経度(自動取得)：<input id="HIDE" value="" name="lon"></label><br>
                    <br><br>
                   <button class="form-control3" type="submit">送 信</button>   
                    <!-- <input type="submit" value="送信"> -->
                </fieldset>
            </form>
        </div>
        </div>
    </div>

    
    <br>
     <p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
     <br>
 </div>


<!-- MapArea -->

<!-- jQuery&GoogleMapsAPI -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- /jQuery&GoogleMapsAPI -->

<!-- [ Pushpin Object ] https://msdn.microsoft.com/en-us/library/mt712673.aspx -->
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArwFx8x1TcZH1WaSrHTQYhgTr55EIhPuBL57UBtKRSO0ZNvoWwQR6icNl0Fz9Oq_' async defer></script>
<!-- 山崎先生の作ったjsを使う -->
<script src="bmap.js"></script>

<script src="js/script.js"></script>


<!-- javascript -->
<script src="https://www.gstatic.com/firebasejs/5.7.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyB8oLNw9cR6VTHLRqcxY7NWYUB7TH5ddXo",
    authDomain: "maps-884bf.firebaseapp.com",
    databaseURL: "https://maps-884bf.firebaseio.com",
    projectId: "maps-884bf",
    storageBucket: "maps-884bf.appspot.com",
    messagingSenderId: "233959714229"
  };
  firebase.initializeApp(config);


var now = new Date();
var time = 
    ( now.getHours() )+"時"+
    ( now.getMinutes() )+"分";

var yyyymmdd = 
    now.getFullYear()+"年"+
	( "0"+( now.getMonth()+1 ) ).slice(-2)+"月"+
	( "0"+now.getDate() ).slice(-2)+"日";
    // ( now.getHours() )+"時"+
    // ( now.getMinutes() )+"分";

$('#resultAA').html(yyyymmdd);
$('#resultAAA').html(time);

$("#btnD").on("click", function(){
    location.reload();
});

const randomNumber1 = Math.random()*0.4;
const randomNumber2 = Math.random()*0.4;
const randomNumber3 = Math.random()*0.4;
const randomNumber4 = Math.random()*0.4;
const randomNumber5 = Math.random()*0.4;
const randomNumber6 = Math.random()*0.4;



var newPostRef = firebase.database().ref();



//1．位置情報の取得に成功した時の処理
let map; 
function mapsInit(position) {
    //lat=緯度、lon=経度 を取得    
    const lat01=position.coords.latitude; // 横線　プラス：上に、マイナス：下に
    const lon01=position.coords.longitude; // 縦線　マイナス：左に、プラス：右に

document.getElementById('TOMO').value=lat01;  //inputの中に引き渡すため
document.getElementById('HIDE').value=lon01; //inputの中に引き渡すため

    const lat02=lat01+randomNumber1;
    const lon02=lon01-randomNumber2;

    $('#view1').html(lat01);
    $('#view2').html(lon01);

    $("#btnD").on("click", function(){
    newPostRef.push({
            date2: time,
            judge: g,
        })
    });


    map = mapStart("#myMap01", lat01, lon01, "load", 8); //Initialization processing
    mapPushpin(map, lat01, lon01, "#ff0000", true,true,true,true); //pushpin
    mapInfobox(map, lat01, lon01, "現在地", "私はここにいます！"); //infobox
    }; 



//2． 位置情報の取得に失敗した場合の処理
function mapsError(error) {
  let e = "";
  if (error.code == 1) { //1＝位置情報取得が許可されてない（ブラウザの設定）
    e = "位置情報が許可されてません";
  }
  if (error.code == 2) { //2＝現在地を特定できない
    e = "現在位置を特定できません";
  }
  if (error.code == 3) { //3＝位置情報を取得する前にタイムアウトになった場合
    e = "位置情報を取得する前にタイムアウトになりました";
  }
  alert("エラー：" + e);
};

//3.位置情報取得オプション
var set ={
  enableHighAccuracy: true, //より高精度な位置を求める
  maximumAge: 20000,        //最後の現在地情報取得が20秒以内であればその情報を再利用する設定
  timeout: 10000            //10秒以内に現在地情報を取得できなければ、処理を終了 この時間を待って取得できなければ”タイムアウトのアラートを出す”
};

//Main:位置情報を取得する処理 //getCurrentPosition :or: watchPosition

function GetMap(){
navigator.geolocation.getCurrentPosition(mapsInit, mapsError, set);
}

</script>
</body>
</html>
