<?php
    class MemberDAO{
        private $db;

        public function __construct(){
            try {
                $this->db = new PDO("mysql:host=localhost,dbname=php", "root", "");//생성되면 db가 연결된 것
                // pdo는 데이터베이스를 제어하는 방법을 표준화 시킨것
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//->연산자 = this안에 db안에 setAttribute
            } catch (PDOException $e) {
                exit($e->getMessage());
                // 에러가 발생하면 에러안에 getMessage함수를 호출한다
            }//try-catch end

        }//function __construct end

        function getMember($id){
            try {
                // place holder
                $pstmt = $this->db->prepare("select * from member where id=:id");//:id는 보안상, 처리속도 때문에 bindValue로 쿼리문 구현
                // prepare에 쿼리문을 넣으면 쿼리문을 데이터베이스에서 실행시킨다
                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                // bindValue  매개변수ID|매개변수 바인딩 값|명시적 데이터 형 지정
                $pstmt->execute();//쿼리문 실행
                $result = $pstmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC - 결과 세트에 리턴된 대로 '컬럼 이름에 의해 인덱스화된 배열'을 리턴한다[행을 반환하는 방법을 결정]
                //fetch()는 안에 매개변수로 정해진 fetch_style에 의거해 결과세트로부터 1행을 꺼낸다
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }//try-catch end
            return $result;
        }//getMember end

        function insertMember($id, $pw, $neme){
            try {
                $sql = "insert into member(id, pw, name) values(:id, :pw,:name)";
                $pstmt->db->prepare($sql);
                $pstmt->bindValue(":id",$id, PDO::PARAM_STR);
                $pstmt->bindValue(":pw",$pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name",$name, PDO::PARAM_STR);

                $pstmt->execute();

            } catch (PDOException $e) {
                exit($e->getMessage());
            }//try-catch end

        }//insertMember function end
    }//class end
 ?>
