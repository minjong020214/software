<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>어르신 복지 웹페이지</title>
    <style type="text/css">
        table {
            border: none;
            border-spacing: 5px 0;
        }

        #tableall {
            border: 0;
        }

        #tablechart {
            width: 400px;
        }

        #tablechart td {
            border-width: 1px;
            border-color: gray;
            border-style: none none solid none;
        }

        #trtitle td {
            border: none;
            background-color: gainsboro;
            text-align: center;
        }

        #tdnum {
            text-align: right;
        }
    </style>
</head>

<body>
    <center>
        <table id="tableall">
            <tr>
                <td>
                    관리자 목록
                </td>
            </tr>
            <tr>
                <td>
                    <table id="tablechart">
                        <tr id="trtitle">
                            <td>번호</td>
                            <td>이름</td>
                            <td>전화번호</td>
                        </tr>
                        <!-- 데이터베이스(php) 연결 -->
                        <?php
                            $server = "localhost";
                            // $server = "localhost:3306";
                            // $server = "112.175.184.59";
                            $user = "softwareteam";
                            $password = "teamteam12#";
                            $dbname = "softwareteam";
                            $port = "3306";

                            $conn = mysqli_connect($server, $user, $password, $dbname);

                            // if ($conn -> connect_error) echo "<tr><td colspan='3'><center>접속에 실패하였습니다.</center></td></tr>";
                            // else echo "<tr><td colspan='3'><center>접속에 성공하였습니다.</center></td></tr>";
                        ?>
                        <?php
                            $sql = "SELECT * from MANAGER;";
                            $result = mysqli_query($conn, $sql); //쿼리 실행
                        
                            if ( $result ) { 
                                echo "관리자 데이터가 ".mysqli_num_rows($result)."명 있습니다.<br />"; // 값이 array ㅇㅈㄹ
                                while ($row = mysqli_fetch_assoc($result)){
                                    // echo "<br />". $row["MB_NAME"];
                                    echo "<tr><td id='tdnum'>".$row["MG_NUM"]."</td>
                                    <td>".$row["MG_NAME"]."</td>
                                    <td>".$row["MG_PNUM"]."</td>
                                    </tr>";
                                }
                                mysqli_free_result($result);
                            }
                            // echo (isset($result)&& $result -> num_rows);
                            ?>
                        <!-- 데이터베이스 목록 받아오기 시작 -->
                        
                        <?php
                          mysqli_close($conn); //sql 종료
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>