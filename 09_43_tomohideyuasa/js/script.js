    // canvas base
    // const can = $("#canvas")[0];
    // const ctx = can.getContext("2d");


    const can= $('#canvas')[0];
    const ctx = can.getContext("2d");

    // ctx.fillStyle = "#0f0";
    // ctx.strokeStyle = "#0ff";

    // ctx.fillStyle = "#0f0";
    // ctx.strokeStyle = "#f00";
    // // ctx.lineWidth = 9;

    // // ctx.fillRect(100, 100, 50, 50 ); // 左上のx,y座標から、幅と高さで塗りつぶし範囲を指定する
    // // ctx.strokeRect(100, 100, 50, 50 ); // 枠線のみ

    // const num1 = Math.random()+0.3;
    // const num2 = Math.random()+0.9;
    // const num3 = Math.random()+0.4;
    // const num4 = Math.random()+0.4;
    // const num5 = Math.random()+0.8;
    // const num6 = Math.random()+0.3;
    // const num7 = num2 + 0.2;
    
    let position = 0;

    var Judge = 0;
    var Judge2 = 0;
    var Judge3 = 0;
    var Judge4 = 0;
    var Judge5 = 0;
    var Judge6 = 0;
    var Judge7 = 0;

    var Point = 0;

    var P1 = 0;
    var P2 = 0;
    var P3 = 0;
    var P4 = 0;
    var P5 = 0;
    var P6 = 0;
    var P7 = 0;



    // setInterval(function(){
    //     ctx.clearRect(position, position, 50, 50 ); // 消す　消しゴム
    //     position++;       
    //     ctx.fillRect(position, position, 50, 50 ); // 左上のx,y座標から、幅と高さで塗りつぶし範囲を指定する
    //     // ctx.strokeRect(position, position, 50, 50 ); // 枠線のみ
    //     // position++;
    // },100); // set time は一回だけfunctionの中のプログラムを動かす(100 = 0.1秒ごと)

    // let count = 200;

    // setInterval(function(){
        
    //     ctx.clearRect(count,count,20,20);
    //     count++;
    //     ctx.fillRect(count,count,20,20);


    // },50);

    

    /*---------------------------
     * ufoについて
     *--------------------------*/
    //ufoのオブジェクトデータ
    //  const ufo = {
    //     posX:0,
    //     posY:can.height/2,
    //     flag:false,
    //     img:"images/ufo.gif",
    // };
 
    const ufo ={
        posX : 0,
        posY : can.height/2,
        img : 'images/thunderbird.png',
    };

    const enemy = {
        posX : 550,
        posY : 50,
        img : 'images/enemy2.png',
        HP : 10,
    };

    const enemy2 = {
        posX : 1300,
        posY : 150,
        img : 'images/enemy3.png',
        HP : 20,
    };

    const enemy3 = {
        posX : 750,
        posY : 250,
        img : 'images/enemy2.png',
        HP : 10,
    };

    const enemy4 = {
        posX : 1210,
        posY : 350,
        img : 'images/enemy2.png',
        HP : 10,
    };

    const enemy5 = {
        posX : 1330,
        posY : 450,
        img : 'images/enemy3.png',
        HP : 20,
    };

    const enemy6 = {
        posX : 850,
        posY : 550,
        img : 'images/enemy2.png',
        HP : 10,
    };

    const boss = {
        posX : 1900,
        posY : -30,
        img : 'images/ika.png',
        HP : 800,
    };

    const base = {
        posX : 0,
        posY : 0,
        img : 'images/base.png',
        HP : 5000,
    };

    const clear = {
        posX : 200,
        posY : 169,
        img : 'images/clear.png',
        HP : 0,
    };


    const newImage = $('<img>').attr("src", ufo.img);
    newImage.on("load",function(){
        console.log(this);
        ctx.drawImage(this,ufo.posX,ufo.posY); //this = その対象を示す、0=x座標、次の場所y座標
        ufo.width = this.width;
        ufo.height = this.height;
        ufo.img = this;
        console.log(ufo);
    });

    const newImage2 = $('<img>').attr("src", enemy.img);
    newImage2.on("load",function(){
        enemy.width = this.width;
        enemy.height = this.height;
        enemy.img = this;
        // ctx.drawImage(enemy.img, enemy.posX, enemy.posY);
    });

    const newImage3 = $('<img>').attr("src", enemy2.img);
    newImage3.on("load",function(){
        enemy2.width = this.width;
        enemy2.height = this.height;
        enemy2.img = this;
    });

    const newImage4 = $('<img>').attr("src", enemy3.img);
    newImage4.on("load",function(){
        enemy3.width = this.width;
        enemy3.height = this.height;
        enemy3.img = this;
    });

    const newImage5 = $('<img>').attr("src", enemy4.img);
    newImage5.on("load",function(){
        enemy4.width = this.width;
        enemy4.height = this.height;
        enemy4.img = this;
    });

    const newImage6 = $('<img>').attr("src", enemy5.img);
    newImage6.on("load",function(){
        enemy5.width = this.width;
        enemy5.height = this.height;
        enemy5.img = this;
    });

    const newImage7 = $('<img>').attr("src", enemy6.img);
    newImage7.on("load",function(){
        enemy6.width = this.width;
        enemy6.height = this.height;
        enemy6.img = this;
    });

    const newImage8 = $('<img>').attr("src", boss.img);
    newImage8.on("load",function(){
        boss.width = this.width;
        boss.height = this.height;
        boss.img = this;
    });

    const newImage9 = $('<img>').attr("src", clear.img);
    newImage9.on("load",function(){
        clear.width = this.width;
        clear.height = this.height;
        clear.img = this;
    });

    const newImage10 = $('<img>').attr("src", base.img);
    newImage10.on("load",function(){
        base.width = this.width;
        base.height = this.height;
        base.img = this;
    });



    $(can).on("mousemove", function(e){
        ctx.clearRect(ufo.posX, ufo.posY, ufo.width, ufo.height);
        // ctx.clearRect(ufo.posX, ufo.posY, ufo.width, ufo.height);
        console.log(e);
        ufo.posX = e.offsetX - ufo.width;
        ufo.posY = e.offsetY - ufo.height/2;
        // ufo.posY = e.offsetY - ufo.height;
        ctx.drawImage(ufo.img, ufo.posX, ufo.posY, ufo.width, ufo.height);
    });







    // マウス動いたらufoを動かす関数
    // const ufoMove=function(e){
    //     ufo.flag = true;
    //     if(ufo.flag){
    //         ctx.clearRect(0, ufo.posY, ufo.width, ufo.height);
    //         ufo.posY = e.offsetY - ufo.height/2; //ufoの位置情報更新Y
    //         ctx.drawImage(ufo.img, 0, ufo.posY);
    //     }
    // };




    // マウスアウトしたらUFOの動き止める
    // const ufoStop = function(){
    //     ufo.flag = false;
    // }

    /*---------------------------
     * 敵について
     *--------------------------*/

   // const teki ={
    //     posX:600,
    //     posY:can.height/2,
    //     img:'images/stamp10.png',
    // }








    // setInterval(function(){
    //     ctx.clearRect(enemy.img, enemy.posX, enemy.posY); // 消す　消しゴム
    //     var enemy.posX -= enemy.speed;      
    //     ctx.fillRect(position, position, 50, 50 ); // 左上のx,y座標から、幅と高さで塗りつぶし範囲を指定する
    //     // ctx.strokeRect(position, position, 50, 50 ); // 枠線のみ
    //     // position++;
    // },100); // set time は一回だけfunctionの中のプログラムを動かす(100 = 0.1秒ごと)



     
    /*---------------------------
     * ufoが発射する弾について
     *--------------------------*/
     //弾のオブジェクト元データ
    // const ballData = {
    //     speed:5,
    //     width:10,
    //     height:10,
    //     posX:0,
    //     posY:0,
    //     color:"#d00",
    // }

    const ballData = {
        speed:12,
        width:30,
        height:5,
        posX: ufo.width,
        posY: ufo.posY,
        color:"#00F",
    };

    const ballData2 = {
        speed:10,
        width:5,
        height:5,
        posX: ufo.width,
        posY: ufo.posY,
        color:"#f00", 
    };

    const ballData3 = {
        speed:10,
        width:5,
        height:5,
        posX: ufo.width,
        posY: ufo.posY,
        color:"#f00",
    };

    const ballData4 = {
        speed:40,
        width:30,
        height:5,
        posX: ufo.width,
        posY: ufo.posY,
        color:"#6ff", 
    };



    const ballDataPosition = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition2 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition3 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition4 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition5 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition6 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };

    const ballDataPosition7 = {
        ballLeft : 0,
        ballRight : 0,
        ballTop : 0,
        ballBottom : 0
    };



    //発射された弾を格納するための配列を作成
    
    const ballGroup = [];
    const ballGroup2 = [];
    const ballGroup3 = [];
    const ballGroup4 = [];








    // const name = "こすげ";
    // const age ="36";

    // // コピーしている感じ

    // const name2 = name;
    // const age2 = age;

    // console.log(name2, age2);

    // const kosuge ={
    //     name: "kosuge",
    //     age: 36,
    // };

    // const yagi = Object.assign({},kosuge); //オブジェクト全体のコピーは、assignを使わないと変になので、assignを使う。すでないと前のものが上書きされてしまう。
    // yagi.name = "yagi";

    // console.log(yagi.name, kosuge.name);

    // 新しい弾を発射する関数
    // const shootBall = function(e){
    //     const newShootBall = Object.assign({},ballData);
    //     newShootBall.posX = ufo.width;
    //     newShootBall.posY = ufo.posY + (ufo.height/2 - newShootBall.height/2);
    //     ctx.fillStyle = newShootBall.color;
    //     ctx.fillRect(newShootBall.posX, newShootBall.posY, newShootBall.width, newShootBall.height);
    //     ballGroup.push(newShootBall);
    // }

const shootBall = function(e){
    const newShootBall = Object.assign({},ballData);
    newShootBall.posX = ufo.posX + ufo.width;
    newShootBall.posY = ufo.posY + (ufo.height/2);
    ctx.fillStyle = ballData.color;
    ctx.fillRect(newShootBall.posX, newShootBall.posY, newShootBall.width, newShootBall.height);
    ballGroup.push(newShootBall); 
    console.log(ballGroup);
};

const shootBall2 = function(e){
    const newShootBall2 = Object.assign({},ballData2);
    newShootBall2.posX = ufo.posX + ufo.width;
    newShootBall2.posY = ufo.posY + (ufo.height/2);
    ctx.fillStyle = ballData2.color;
    ctx.fillRect(newShootBall2.posX, newShootBall2.posY, newShootBall2.width, newShootBall2.height);
    ballGroup2.push(newShootBall2); 
    console.log(ballGroup2);
};

const shootBall3 = function(e){
    const newShootBall3 = Object.assign({},ballData3);
    newShootBall3.posX = ufo.posX + ufo.width;
    newShootBall3.posY = ufo.posY + (ufo.height/2);
    ctx.fillStyle = ballData3.color;
    ctx.fillRect(newShootBall3.posX, newShootBall3.posY, newShootBall3.width, newShootBall3.height);
    ballGroup3.push(newShootBall3); 
    console.log(ballGroup3);
};

// const shootBall4 = function(e){
//     const newShootBall4 = Object.assign({},ballData4);
//     newShootBall4.posX = ufo.posX + ufo.width;
//     newShootBall4.posY = ufo.posY + (ufo.height/2);
//     ctx.fillStyle = ballData4.color;
//     ctx.fillRect(newShootBall4.posX, newShootBall4.posY, newShootBall4.width, newShootBall4.height);
//     ballGroup4.push(newShootBall4); 
//     console.log(ballGroup4);
// };


$(can).on("mousedown", shootBall);
$(can).on("mousedown", shootBall2);
$(can).on("mousedown", shootBall3);
// $(can).on("mousedown", shootBall4);


    // 配列内の全ての弾の位置を移動させる
    // const moveBall = function(){
    //     // 配列名.forEach(function(ball){
    //     //
    //     // })
    //     // 配列の中身１つ１つに、同じ命令を順番に行うことができる
    //     ballGroup.forEach(function(ball){
    //         ctx.clearRect(ball.posX, ball.posY, ball.width, ball.height);
    //         ctx.fillStyle = ball.color;
    //         ball.posX += ball.speed; //speedの分だけ座標を足している
    //         ctx.fillRect(ball.posX, ball.posY, ball.width, ball.height);   
    //     });
    // };

    const moveBall = function(){
        ballGroup.forEach(function(ball){
            ctx.clearRect(ball.posX, ball.posY, ball.width, ball.height);
            ball.posX +=ball.speed;
            // ball.posY -=ball.speed;
            ctx.fillRect(ball.posX, ball.posY, ball.width, ball.height);
        }); //ballは変数
    };

    const moveBall2 = function(){
        ballGroup2.forEach(function(ball2){
            ctx.clearRect(ball2.posX, ball2.posY, ball2.width, ball2.height);
            ball2.posX +=ball2.speed;
            ball2.posY -=ball2.speed;
            ctx.fillRect(ball2.posX, ball2.posY, ball2.width, ball2.height);
        }); //ballは変数
    };

    const moveBall3 = function(){
        ballGroup3.forEach(function(ball3){
            ctx.clearRect(ball3.posX, ball3.posY, ball3.width, ball3.height);
            ball3.posX +=ball3.speed;
            ball3.posY +=ball3.speed;
            ctx.fillRect(ball3.posX, ball3.posY, ball3.width, ball3.height);
        }); //ballは変数
    };

    // const moveBall4 = function(){
    //     ballGroup4.forEach(function(ball4){
    //         ctx.clearRect(ball4.posX, ball4.posY, ball4.width, ball4.height);
    //         ball4.posX +=ball4.speed;
    //         ctx.fillRect(ball4.posX, ball4.posY, ball4.width, ball4.height);
    //     }); //ballは変数
    // };

    // 配列内の全てのボールを精査して、canvasからスクリーンアウトしたら
    // 配列から該当の弾のデータを消去
    // const deleteBall=function(){
    //     for(let i = 0; i < ballGroup.length; i++) {
    //         if (ballGroup[i].posX >= can.width) {
    //             ballGroup.splice(i,1);
    //         }
    //     }
    // };

    // 画面外のボールの情報を消さないと負荷がかかりすぎるので消す。
    const deleteBall = function(){
        for(let c=0; c<ballGroup.length; c++){
            if(ballGroup[c].posX >= can.width){
                ballGroup.splice(c,1); //配列の一部のものを削除する
            }
        }
    };

    // const deleteBall2 = function(){
    //     for(let d=0; d<ballGroup2.length; d++){
    //         if(ballGroup[d].posY <= 0){
    //             ballGroup2.splice(d,1); //配列の一部のものを削除する
    //         }
    //     }
    // };

    // const deleteBall3 = function(){
    //     for(let e=0; e<ballGroup3.length; e++){
    //         if(ballGroup[e].posY >= can.hight){
    //             ballGroup3.splice(e,1); //配列の一部のものを削除する
    //         }
    //     }
    // };


    /*---------------------------
     * 当たり判定
    //  *--------------------------*/
    // const hitJudge = function(){
    //     for(let k=0;k<ballGroup.length;k++){

    //         const ballLeft = ballGroup[k].posX;
    //         const ballRight = ballLeft + ballGroup[k].width;
    //         const ballTop = ballGroup[k].posY;
    //         const ballBottom = ballTop + ballGroup[k].height;

    //         const enemyLeft = enemy.posX;
    //         const enemyTop = enemy.posY;
    //         const enemyBottom = enemyTop + enemy.height;

    //         if((ballRight >= enemyLeft) &&
    //            (ballTop <= enemyBottom) && 
    //            (ballBottom >= enemyTop)
    //           ){                              
    //             ctx.clearRect(ballLeft, ballTop, ballGroup[k].width, ballGroup[k].height);
    //             ballGroup.splice(k,1);  
    //             console.log("あたった");
    //         }
    //     }  
    //  };

 

    /*---------------------------
     * ページ読み込み時の描画処理
     *--------------------------*/


    /*---------------------------
     * ゲームスタートしてからのループ処理(10)
     *--------------------------*/

    setInterval(function(){
   
        moveBall();  

        if(Point>=4){
        moveBall(); 
        moveBall2();
        moveBall3(); 
        };

        deleteBall();

        ctx.clearRect(base.posX-position,  base.posY,  base.width,  base.height);

        ctx.clearRect(enemy.posX-position,  enemy.posY,  enemy.width,  enemy.height);
        ctx.clearRect(enemy2.posX-position, enemy2.posY, enemy2.width, enemy2.height);
        ctx.clearRect(enemy3.posX-position, enemy3.posY, enemy3.width, enemy3.height);
        ctx.clearRect(enemy4.posX-position, enemy4.posY, enemy4.width, enemy4.height);
        ctx.clearRect(enemy5.posX-position, enemy5.posY, enemy5.width, enemy5.height);
        ctx.clearRect(enemy6.posX-position, enemy6.posY, enemy6.width, enemy6.height);
        ctx.clearRect(boss.posX-position+Judge7/2, boss.posY+Judge7/2-15, boss.width-(Judge7*(735/900))+10, boss.height-Judge7+20);
        position++; 

        ctx.drawImage(base.img,  base.posX-position,  base.posY);
        ctx.drawImage(enemy.img,  enemy.posX-position,  enemy.posY);
        ctx.drawImage(enemy2.img, enemy2.posX-position, enemy2.posY);
        ctx.drawImage(enemy3.img, enemy3.posX-position, enemy3.posY);
        ctx.drawImage(enemy4.img, enemy4.posX-position, enemy4.posY);
        ctx.drawImage(enemy5.img, enemy5.posX-position, enemy5.posY);
        ctx.drawImage(enemy6.img, enemy6.posX-position, enemy6.posY);
        ctx.drawImage(boss.img, boss.posX-position+Judge7/2, boss.posY+Judge7/2, boss.width-(Judge7*(735/900)), boss.height-Judge7);


         for(let k=0;k<ballGroup.length;k++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp = Object.assign({},ballDataPosition);
            bp.ballLeft = ballGroup[k].posX;
            bp.ballRight = bp.ballLeft + ballGroup[k].width;
            bp.ballTop = ballGroup[k].posY;
            bp.ballBottom = bp.ballTop + ballGroup[k].height;
            // const ballLeft = ballGroup[k].posX;
            // const ballRight = ballLeft + ballGroup[k].width;
            // const ballTop = ballGroup[k].posY;
            // const ballBottom = ballTop + ballGroup[k].height;
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft = enemy.posX-position;
            const enemyTop = enemy.posY;
            const enemyBottom = enemyTop + enemy.height;
            const enemyRight = enemyLeft + enemy.width; 

            if((bp.ballRight >= enemyLeft) && (bp.ballTop <= enemyBottom) && (bp.ballBottom
            >= enemyTop) &&  (bp.ballLeft <= enemyRight)){
            ctx.clearRect(bp.ballLeft, bp.ballTop, ballGroup[k].width, ballGroup[k].height);
            ballGroup.splice(k,1);
            Judge ++;        
            console.log("敵１にあたった");
            console.log(Judge);
            }
        };


        for(let l=0;l<ballGroup.length;l++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp2 = Object.assign({},ballDataPosition2);
            bp2.ballLeft = ballGroup[l].posX;
            bp2.ballRight = bp2.ballLeft + ballGroup[l].width;
            bp2.ballTop = ballGroup[l].posY;
            bp2.ballBottom = bp2.ballTop + ballGroup[l].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft2 = enemy2.posX-position;
            const enemyTop2 = enemy2.posY;
            const enemyBottom2 = enemyTop2 + enemy2.height;
            const enemyRight2 = enemyLeft2 + enemy2.width; 

            if((bp2.ballRight >= enemyLeft2) && (bp2.ballTop <= enemyBottom2) && (bp2.ballBottom
            >= enemyTop2) && (bp2.ballLeft <= enemyRight2)){
            ctx.clearRect(bp2.ballLeft, bp2.ballTop, ballGroup[l].width, ballGroup[l].height);
            ballGroup.splice(l,1);
            Judge2 ++;        
            console.log("敵２にあたった");
            console.log(Judge2);
            }
        };

        for(let m=0;m<ballGroup.length;m++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp3 = Object.assign({},ballDataPosition3);
            bp3.ballLeft = ballGroup[m].posX;
            bp3.ballRight = bp3.ballLeft + ballGroup[m].width;
            bp3.ballTop = ballGroup[m].posY;
            bp3.ballBottom = bp3.ballTop + ballGroup[m].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft3 = enemy3.posX-position;
            const enemyTop3 = enemy3.posY;
            const enemyBottom3 = enemyTop3 + enemy3.height;
            const enemyRight3 = enemyLeft3 + enemy3.width; 

            if((bp3.ballRight >= enemyLeft3) && (bp3.ballTop <= enemyBottom3) && (bp3.ballBottom
            >= enemyTop3) && (bp3.ballLeft <= enemyRight3)){
            ctx.clearRect(bp3.ballLeft, bp3.ballTop, ballGroup[m].width, ballGroup[m].height);
            ballGroup.splice(m,1);
            Judge3 ++;        
            console.log("敵３にあたった");
            console.log(Judge3);
            }
        };

        for(let n=0;n<ballGroup.length;n++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp4 = Object.assign({},ballDataPosition4);
            bp4.ballLeft = ballGroup[n].posX;
            bp4.ballRight = bp4.ballLeft + ballGroup[n].width;
            bp4.ballTop = ballGroup[n].posY;
            bp4.ballBottom = bp4.ballTop + ballGroup[n].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft4 = enemy4.posX-position;
            const enemyTop4 = enemy4.posY;
            const enemyBottom4 = enemyTop4 + enemy4.height;
            const enemyRight4 = enemyLeft4 + enemy4.width; 

            if((bp4.ballRight >= enemyLeft4) && (bp4.ballTop <= enemyBottom4) && (bp4.ballBottom
            >= enemyTop4) && (bp4.ballLeft <= enemyRight4)){
            ctx.clearRect(bp4.ballLeft, bp4.ballTop, ballGroup[n].width, ballGroup[n].height);
            ballGroup.splice(n,1);
            Judge4 ++;        
            console.log("敵４にあたった");
            console.log(Judge4);
            }
        };

        for(let p=0;p<ballGroup.length;p++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp5 = Object.assign({},ballDataPosition5);
            bp5.ballLeft = ballGroup[p].posX;
            bp5.ballRight = bp5.ballLeft + ballGroup[p].width;
            bp5.ballTop = ballGroup[p].posY;
            bp5.ballBottom = bp5.ballTop + ballGroup[p].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft5 = enemy5.posX-position;
            const enemyTop5 = enemy5.posY;
            const enemyBottom5 = enemyTop5 + enemy5.height;
            const enemyRight5 = enemyLeft5 + enemy5.width; 

            if((bp5.ballRight >= enemyLeft5) && (bp5.ballTop <= enemyBottom5) && (bp5.ballBottom
            >= enemyTop5) && (bp5.ballLeft <= enemyRight5)){
            ctx.clearRect(bp5.ballLeft, bp5.ballTop, ballGroup[p].width, ballGroup[p].height);
            ballGroup.splice(p,1);
            Judge5 ++;        
            console.log("敵５にあたった");
            console.log(Judge5);
            }
        };   

        for(let r=0;r<ballGroup.length;r++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp6 = Object.assign({},ballDataPosition6);
            bp6.ballLeft = ballGroup[r].posX;
            bp6.ballRight = bp6.ballLeft + ballGroup[r].width;
            bp6.ballTop = ballGroup[r].posY;
            bp6.ballBottom = bp6.ballTop + ballGroup[r].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft6 = enemy6.posX-position;
            const enemyTop6 = enemy6.posY;
            const enemyBottom6 = enemyTop6 + enemy6.height;
            const enemyRight6 = enemyLeft6 + enemy6.width; 

            if((bp6.ballRight >= enemyLeft6) && (bp6.ballTop <= enemyBottom6) && (bp6.ballBottom
            >= enemyTop6) && (bp6.ballLeft <= enemyRight6)){
            ctx.clearRect(bp6.ballLeft, bp6.ballTop, ballGroup[r].width, ballGroup[r].height);
            ballGroup.splice(r,1);
            Judge6 ++;        
            console.log("敵６にあたった");
            console.log(Judge6);
            }
        }; 

        for(let s=0;s<ballGroup.length;s++){
            // 弾の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）
            const bp7 = Object.assign({},ballDataPosition7);
            bp7.ballLeft = ballGroup[s].posX;
            bp7.ballRight = bp7.ballLeft + ballGroup[s].width;
            bp7.ballTop = ballGroup[s].posY;
            bp7.ballBottom = bp7.ballTop + ballGroup[s].height;
  
            // 敵の上下左右の座標をわかりやすく変数にして管理（この辺オブジェクトにしてもOK）

            const enemyLeft7 = boss.posX-position+Judge7/2;
            const enemyTop7 = boss.posY+Judge7/2;
            const enemyBottom7 = enemyTop7 + boss.height-Judge7;
            const enemyRight7 = enemyLeft7 + boss.width-(Judge7*(735/900)); 

            if((bp7.ballRight >= enemyLeft7) && (bp7.ballTop <= enemyBottom7) && (bp7.ballBottom
            >= enemyTop7) && (bp7.ballLeft <= enemyRight7)){
            ctx.clearRect(bp7.ballLeft, bp7.ballTop, ballGroup[s].width, ballGroup[s].height);
            ballGroup.splice(s,1);
            Judge7 = Judge7 + 8;        
            console.log("ボスにあたった");
            console.log(Judge7);
            }
        };



    if(Judge>=enemy.HP){
        ctx.clearRect(enemy.posX-position, enemy.posY, enemy.width, enemy.height);
        P1=1;
        };
      
    if(Judge2>=enemy2.HP){
        ctx.clearRect(enemy2.posX-position, enemy2.posY, enemy2.width, enemy2.height);
        P2=5;
        };

    if(Judge3>=enemy3.HP){
        ctx.clearRect(enemy3.posX-position, enemy3.posY, enemy3.width, enemy3.height);
        P3=1;
        };

    if(Judge4>=enemy4.HP){
        ctx.clearRect(enemy4.posX-position, enemy4.posY, enemy4.width, enemy4.height);
        P4=1;
        };

    if(Judge5>=enemy5.HP){
        ctx.clearRect(enemy5.posX-position, enemy5.posY, enemy5.width, enemy5.height);
        P5=5;
        };

    if(Judge6>=enemy6.HP){
        ctx.clearRect(enemy6.posX-position, enemy6.posY, enemy6.width, enemy6.height);
        P6=1;
        };

    if(Judge7>=boss.HP){
        ctx.clearRect(boss.posX-position+Judge7/2, boss.posY+Judge7/2-15, boss.width-(Judge7*(735/900))+10, boss.height-Judge7+20);
        ctx.drawImage(clear.img, clear.posX, clear.posY);
        };

    Point = P1 + P2 + P3 + P4 + P5 + P6;
    console.log(Point)
    },30);


 

