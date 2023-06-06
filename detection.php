<!DOCTYPE html>
<html>
<head>
    <title>검색 폼</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="searchInput" placeholder="검색어를 입력하세요">
        <button type="submit" name = "test">검색</button>
        <br>  <br/>
        <input type="text" name="emcNum" placeholder="검색어를 입력하세요">
        <button type="submit" name = "emc">비상</button>
    </form>
    <!-- <input type="text" name="searchInput" placeholder="검색어를 입력하세요">
    <button onclick="clickMe()" type="submit" >검색</button>
    
    <script>
        function clickMe(){
        var result ="<?php test1(); ?>"
        document.write(result);
        }
    </script> -->
    <?php
    if(isset($_POST['test'])){
        test1();
    }
    
    function test1(){ //나중에 이름 바꿔야함
        $query = $_POST["searchInput"];

        $server = "localhost";
                // $server = "localhost:3306";
                //$server = "112.175.184.59";
        $user = "softwareteam";
        $password = 'teamteam12#';
        $dbname = "softwareteam";
        $port = '3306';
                    
        $conn = mysqli_connect($server, $user, $password, $dbname, $port);
                
        // if ($conn -> connect_error) echo "접속에 실패하였습니다.<br/>";
        // else echo "접속에 성공하였습니다.<br/>";
        $sql = "SELECT * from MEMBER WHERE MB_NUM = ".$query.";";
        $result = mysqli_query($conn, $sql); //쿼리 실행
                    
        $fp = fopen('./detection/ftp-'.$query.'.txt', 'w');    // list.txt 파일을 쓰기 전용으로 열고 반환된 파일 포인터를 $fp에 저장.
        while ($row = mysqli_fetch_assoc($result)){
            echo $row["MB_NUM"]."<br />";
            $information = $row["MB_NUM"]." : ".$row["MB_NAME"]." : ".$row["MB_BDAY"]." : ".$row["MB_GENDER"]." : ".$row["MB_HOME"]." : ".$row["MG_NUM"];
            fwrite($fp, $information);
        }
        fclose($fp);
                                            
        if ( $result ) {    
            echo "줄:".mysqli_num_rows($result)."<br/>"; // 값이 array ㅇㅈㄹ
            mysqli_free_result($result);
        }
            
        mysqli_close($conn); //sql 종료
        
    }
    function emc(){ //119 신고 함수
        $query1 = $_POST["emcNum"];
        $server = "localhost";
                // $server = "localhost:3306";
                //$server = "112.175.184.59";
        $user = "softwareteam";
        $password = 'teamteam12#';
        $dbname = "softwareteam";
        $port = '3306';
        $conn = mysqli_connect($server, $user, $password, $dbname, $port);

        $sql = "SELECT * from EMERGENCY WHERE MB_NUM = ".$query1.";";
        $sql = "UPDATE `EMERGENCY` SET `EMC_CALL`='0' WHERE MB_NUM = ".$query1.";";
        //UPDATE tablename SET filedA='456' WHERE test='123' LIMIT 10;
        $result = mysqli_query($conn, $sql); //쿼리 실행

    }
    ?>
</body>
</html>


