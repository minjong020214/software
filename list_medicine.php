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
                    약 처방 목록
                </td>
            </tr>
            <tr>
                <td>
                    <table id="tablechart">
                        <tr id="trtitle">
                            <td rowspan="2">회원 번호</td>
                            <td colspan="2">아침</td>
                            <td colspan="2">점심</td>
                            <td colspan="2">저녁</td>
                        </tr>
                        <tr id="trtitle">
                            <td>약 이름</td>
                            <td>복용 시각</td>
                            <td>약 이름</td>
                            <td>복용 시각</td>
                            <td>약 이름</td>
                            <td>복용 시각</td>
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
                            $sql = "SELECT * from MEDICINE;";
                            $result = mysqli_query($conn, $sql);
                            // 쿼리 실행
                        
                            if ( $result ) { 
                                echo "약 처방 데이터가 ".mysqli_num_rows($result)."개 있습니다.<br />"; 
                                // 값이 array
                                while ($row = mysqli_fetch_assoc($result)){
                                    // echo "<br />". $row["MB_NAME"];
                                    echo "<tr>
                                    <td id='tdnum'>".$row["MB_NUM"]."</td>
                                    <td>".$row["MN_MEDICINE"]."</td>
                                    <td>".$row["MN_TIME"]."</td>
                                    <td>".$row["AF_MEDICINE"]."</td>
                                    <td>".$row["AF_TIME"]."</td>
                                    <td>".$row["EV_MEDICINE"]."</td>
                                    <td>".$row["EV_TIME"]."</td>
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