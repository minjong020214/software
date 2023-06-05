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
            width: 800px;
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
                    멤버 목록
                </td>
            </tr>
            <tr>
                <td>
                    <table id="tablechart">
                        <tr id="trtitle">
                            <td colspan="5">회원</td>
                            <td rowspan="2">마지막 방문일</td>
                            <td rowspan="2">관리자 번호</td>
                        </tr>
                        <tr id="trtitle">
                            <td>번호</td>
                            <td>이름</td>
                            <td>생년월일</td>
                            <td>성별</td>
                            <td>주소</td>
                        </tr>
                        <!-- 데이터베이스(php) 연결 -->
                        <?php
                            $server = "localhost";
                            $user = "softwareteam";
                            $password = "teamteam12#";
                            $dbname = "softwareteam";
                            $port = "3306";

                            $conn = mysqli_connect($server, $user, $password, $dbname);
                        ?>
                        <?php
                            $sql = "SELECT * from MEMBER;";
                            $result = mysqli_query($conn, $sql);
                            // 쿼리 실행
                        
                            if ( $result ) { 
                                echo "멤버가 ".mysqli_num_rows($result)."명 있습니다.<br />"; 
                                // 값이 array
                                while ($row = mysqli_fetch_assoc($result)){
                                    // echo "<br />". $row["MB_NAME"];
                                    echo "<tr>
                                    <td id='tdnum'>".$row["MB_NUM"]."</td>
                                    <td>".$row["MB_NAME"]."</td>
                                    <td>".$row["MB_BDAY"]."</td>
                                    <td>";

                                    $gender = $row["MB_GENDER"];
                                    
                                    if ($gender == "M") {
                                        echo "남";
                                    } else if ($gender == "F") {
                                        echo "여";
                                    } else {
                                        echo "&nbsp;";
                                    }

                                    echo "</td>
                                    <td>".$row["MB_HOME"]."</td>
                                    <td>".$row["LV_DATE"]."</td>
                                    <td id='tdnum'>".$row["MG_NUM"]."</td>
                                    </tr>";
                                }
                                mysqli_free_result($result);
                            }
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