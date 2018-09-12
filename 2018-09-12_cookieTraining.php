<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        /*  1. request 정보에서 id 와 pw 정보를 읽는다.
            2. id 와 pw 값이 있다면
             2.1 id가 본인의 이니셜이고 (ex: scpark, hjpark)
                 pw 가 본인의 학번이면  (ex: 9701234, 1401143)
                 2.1.1
                  scpark님으로 로그인 했습니다.
                  로그아웃 링크 생성
            3. id또는 pw 값이 없거나 그 값이 일치하지 않으면
             3.1
                아이디 :
                암호 :
                로그인 버튼 생성.
        */
        /*
            플래그 변경하는 부분에서 쿠키 생성 넣어주고
            삼항연산자 써서 $user_id,$user_pw 만들때 한번 더 섞어서 쿠키를 먼저 쓰거나 쿠키 없으면 리퀘스트 받거나 공란

        */
// *************************************************************************************************************************************************************************************

        $user_id = isset($_REQUEST["uid"]) ? $_REQUEST["uid"] : (isset($_COOKIE["cuid"]) ? $_COOKIE["cuid"] : "");
            // uid로 읽어올 수 있는 값------있으면 그 값 넣어줌----없으면 다시 cuid가 있는지 확인
        $user_pw = isset($_REQUEST["upw"]) ? $_REQUEST["upw"] : (isset($_COOKIE["cupw"]) ? $_COOKIE["cupw"] : "");

        $trigger=true;//user_id와 user_pw가 지정한 값과 맞는지 비교하는 boolean타입 값
        if($user_id&&$user_pw){
        // user_id와 user_pw가 둘 다 있을 경우
            if($user_id=="mjkim" && $user_pw=="1701035"){
            // user_id와 user_pw를 내가 임의로 지정한 값과 비교한다.
                $trigger=false;
                setcookie("cuid",$user_id,time()+60*60*24);
            //  setcookie(쿠키명,쿠키값  , 시간);
                setcookie("cupw",$user_pw,time()+60*60*24);
    ?>
                <?=$user_id?>님으로 로그인 했습니다.
                <a href="logout.php">로그아웃</a>
    <?php
            }// if user_id, user_pw compare end
        }//if check user_id, user_pw end
        if($trigger){
    ?>
            <form method="post">
                아이디 : <input type="text" name="uid"><br>
                암호 : <input type="password" name="upw"><br>
                <input type="submit" value="로그인">
            </form>
    <?php
        }//if(trigger) end
    ?>
</body>
</html>
