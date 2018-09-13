<?php

/*
    회원가입 폼에서 입력된 정보를 추출
    모든 입력 필드의 값이 채워져 있는지 체크
        - 다 채워져 있지 않으면 메세지 출력 후 회원가입 폼으로 이동
    아이디가 이미 사용중인지 체크
        - 이미 사용중이라면 메세지 출력 후 회원가입 폼으로 이동
    위 조건이 모두 만족하면 데이터베이스에 회원 정보 넣기
    메인 페이지 이동
*/
        require_once("tools.php");//import같이 땡겨오는 것 | _once가 없으면 로딩 시 마다 계속 불러온다
        require_once("MemberDAO.php");

        $id = requestValue("id");//in tools
        $pw = requestValue("pwd");//in tools
        $name = requestValue("username");//in tools

        if ($id && $pw && $name) {
        // id, pw, name이 다 있을 경우
            $mdao = new MemberDAO();
            //mado변수에 데이터베이스 관리 클래스 생성
            if ($mdao->getMember($id)) {
                // 에러메세지 출력하고 홈페이지로 이동
                //$id값이 없으면 if문이 false가 나온다
                errorBack("이미 사용중인 아이디 입니다");
            }else {
                $mdao->insertMember($id, $pw, $name);
                okGo("가입완료", MAIN_PAGE);
            }
        }else {
            errorBack("모든 입력란을 작성해주세요.");
        }//sign up form if-else end
?>
