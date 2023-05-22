<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>어르신 복지 웹페이지</title>
    <style type="text/css">
        table {
            border: none;
            border-spacing: 5px;
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
                            <td id="thnum">번호</td>
                            <td id="thname">이름</td>
                            <td id="thphone">전화번호</td>
                        </tr>
                        <!-- 데이터베이스(php) 연결 -->
                        <?php
                            $server = "localhost";
                            // $server = "localhost:3306";
                            // $server = "112.175.184.59";
                            $user = "softwareteam";
                            $password = "teamteam12#";
                            $dbname = "softwareteam";

                            $conn = new mysqli($server, $user, $password, $dbname);

                            if ($conn -> connect_error) echo "<tr><td colspan='3'><center>접속에 실패하였습니다.</center></td></tr>";
                            else echo "<tr><td colspan='3'><center>접속에 성공하였습니다.</center></td></tr>";
                        
                            // mysqli_close($conn);
                        ?>
                        <!-- 데이터베이스 목록 받아오기 시작 -->
                        <?php
                            $sql = "select * from manager";
                            $result = $conn -> query($sql);

                            echo (isset($result)&& $result -> num_rows);

                            if (isset($result) && $result -> num_rows > 0) {
                                while ($row = $result -> fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td id='tdnum'>";
                                    echo $row['mg_num'];
                                    echo "</td>";
                                    echo "<td id='tdname'>";
                                    echo $row['mg_name'];
                                    echo "</td>";
                                    echo "<td id='tdphone'>";
                                    echo $row['mg_pnum'];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else echo "검색된 데이터가 없습니다.";
                        ?>
                        <tr>
                            <td id="tdnum">1</td>
                            <td id="tdname">백석대</td>
                            <td id="tdphone">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td id="tdnum">2</td>
                            <td id="tdname">문화대</td>
                            <td id="tdphone">010-2345-6789</td>
                        </tr>
                        <tr>
                            <td id="tdnum">3</td>
                            <td id="tdname">이디야</td>
                            <td id="tdphone">041-557-1003</td>
                        </tr>
                        <!-- 데이터베이스 목록 받아오기 종료 -->
                        <?php
                            mysqli_close($conn);
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>