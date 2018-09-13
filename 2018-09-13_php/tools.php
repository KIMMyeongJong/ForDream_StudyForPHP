<?php

    define ("MAIN_PAGE","login_main.php");
    //상수 선언 MAIN_PAGE-상수명  login_main.php-상수값
    function requestValue($name){
        return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
        //isset으로 $_REQUEST[매개변수]가 있는지 확인한 후 삼항 연산자로 리턴값을 정한 후 리턴한다
    }

    function errorBack($msg){
        ?>
<!-- -------------------------------------------------------------------------------- -->
        <!DOCTYPE html>
        <html lang="ko" dir="ltr">
            <head>
                <meta charset="utf-8">
            </head>
            <body>

                <script>
                    alert('<?=$msg ?>');
                    history.back();//바로 이전 페이지로 이동
                </script>
            </body>
        </html>
<!-- ----------------------------------------------------------------------         -->
        <?php
        exit();
    }

    function okGo($msg, $url){
        ?>
        <!-- ----------------------------------------------------------------------------- -->
        <!DOCTYPE html>
        <html lang="ko" dir="ltr">
            <head>
                <meta charset="utf-8">
            </head>
            <body>

                <script>
                    alert('<?=$msg ?>');
                    // 메세지를 받은 $msg는 php의 매개변수기 때문에 자바스크립트에서 매개변수를 쓸 수 있는 값으로 변환해준다
                    location.href='<?=$url?>';
                    // url을 받아 로케이션의 하이퍼링크로 이동한다
                </script>
            </body>
        </html>
        <!-- ---------------------------------------------------------------------------------- -->
        <?php
        exit();
    }
 ?>
