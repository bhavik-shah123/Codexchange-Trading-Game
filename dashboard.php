<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background: #141625;
            font-family: Poppins;
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #main {
            background-color: #30344f;
            display: flex;
            margin: 0;
            font-size: 25px;
            height: 8.7%;
            justify-content: space-between;
            padding: 22px;
        }

        .leftcolumn {
            float: left;
            width: 66.7%;
            height: 82.8%;
            padding-left: 1.4%;
            right: 31.9%;
            bottom: 4.8%;
            padding-top: 2.1%;
            border-radius: 25px;
            font-family: Poppins;
        }

        .rightcolumn {
            float: left;
            width: 31%;
            background-color: #141625;
            padding-left: 3.2%;
            border-radius: 25px;
        }

        .balance {
            float: left;
            height: 12.4%;
            width: 50%;
            margin-right: 2.9%;
            border-radius: 25px;
            background-color: #30344f;
        }

        #head {
            font-family: Poppins;
            color: #ffffff;
            margin-top: 2%;
            font-size: 25px;
            margin-bottom: 0%;
            padding-left: 4.1%;
        }

        #amt {
            font-family: Poppins;
            color: #21e6c1;
            font-size: 35px;
            font-weight: bold;
            margin-top: 0%;
            padding-left: 45.6%;
            margin-bottom: 0%;
            margin-right: 0%;
        }

        .curr_round {
            float: left;
            width: 45%;
            height: 14.4%;
            border-radius: 25px;
            background-color: #30344f;
        }

        #chead {
            font-family: Poppins;
            float: left;
            width: 45%;
            height: 39.4%;
            color: #ffffff;
            font-size: 25px;
            margin-left: 7%;
            margin-top: 6%;
            margin-bottom: 0%;
        }

        #cround {
            font-family: Poppins;
            float: left;
            width: 20%;
            height: 65.8%;
            color: #21e6c1;
            font-size: 35px;
            margin-top: 7.5%;
            font-weight: bold;
            margin-left: 20%;
            margin-bottom: 3%;
        }

        #lower_left {
            margin-top: 20%;
            border-radius: 25px;
            width: 100%;
            height: 62%;
            background-color: #30344f;
            color: #ffffff;
        }

        #mystock {
            font-size: 20px;
            margin-top: 2%;
            margin-left: 3%;
        }

        #upper_right {
            width: 100%;
            height: 68%;
            border-radius: 25px;
            background-color: #30344f;
            margin-top: 9%;
            padding-left: 2%;
            color: #ffffff;
            font-size: 20px;
        }

        #lower_right {
            width: 100%;
            height: 30%;
            border-radius: 25px;
            background-color: #30344f;
        }

        #pos {
            color: #ffffff;
            font-size: 20px;
            text-align: left;
            margin-left: 5%;
            margin-bottom: 0%;
        }

        #num {
            color: #21e6c1;
            font-size: 72px;
            font-weight: bold;
            margin-top: 0%;
            margin-bottom: 0%;
        }

        #rou {
            color: #ffffff;
            margin-top: 0%;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div></div>
        <div style="color:#21e6c1" id="dash">Dashboard</div>
        <div style="color:#ffffff" id="trade">Trading</div>
        <div style="color:white" id="rules">Rules</div>
        <div style="color:#ffffff;font-weight: 800" id="lead">Leaderboard</div>
        <div id="hamburger"><a href=""><img src="HamburgerMenu.png" height="30px"></a></div>
    </div>

    <div class="row">
        <div class="leftcolumn">
            <div id="upper_left">
                <div class="balance">
                    <p id="head">Current Balance</p>
                    <p id="amt">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $user=$_SESSION["username"];
                            $sql="SELECT * FROM users WHERE username='$user'";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                $id=$row["id"];
                            }
                            $sql1="SELECT * FROM balance WHERE id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["current_balance"];
                            }
                        ?>
                    </p>
                </div>
                <div class="curr_round">
                    <p id="chead">Current Round</p>
                    <p id="cround">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $sql="SELECT * FROM round";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                echo $row["round"];
                            }
                    ?>
                    </p>
                </div>
            </div>
            <div id="lower_left">
            <center>
                        <?php
                            echo "<table>";
                            echo "<tr><th>Stock bought of</th><th>Number of shares bought</th><th>Buying Price</th>";
                            $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $user=$_SESSION["username"];
                            $sql="SELECT * FROM users WHERE username='$user'";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                $id=$row["id"];
                            }
                            $sql1="SELECT * FROM history WHERE user_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo "<tr><td>" . $row1["team_name"]. "</td><td>" . $row1["amount_shares"] . "</td><td>".$row1["buying_price"]."</td></tr>";
                            }
                            echo "</table>";
                        ?>
                    </center>
            </div>
        </div>
        <div class="rightcolumn">
            <div id="upper_right">
                <canvas id="mycanvas" width="400" height="350"></canvas>
            </div>
            <div id="lower_right">
                <p id="pos">Position</p>
                <center>
                <p id="num"><?php
                    $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    $user=$_SESSION["username"];
                            $sql="SELECT * FROM users WHERE username='$user'";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                $id=$row["id"];
                            }
                            $sql2="SELECT * FROM round";
                            $result2=$conn->query($sql2);
                            while($row2 = $result2->fetch_assoc())
                            {
                                $r2 = $row2["round"];
                            }   
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round".$r2];
                            }
                    ?></p>
                    <p id="rou">Round <?php
                    $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $sql="SELECT * FROM round";
                            $result=$conn->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                echo $row["round"];
                            }
                    ?></p>
                    
                </center>
            </div>
        </div>

        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="Chart.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
            showGraph();
        });


        function showGraph() {
            {
                $.post("graph.php",
                    function (data) {
                        console.log(data);
                        var balance = [];

                        for (var i in data) {
                            balance.push(data[i].balance);
                        }

                        var chartdata = {
                            labels: "123456",
                            datasets: [
                                {
                                    label: 'Balance',
                                    backgroundColor: 'rgba(0,0,0,0)',
                                    borderColor: '#FF2400',
                                    hoverBackgroundColor: '#CCCCCC',
                                    hoverBorderColor: '#666666',
                                    data: balance
                                }
                            ]
                        };

                        var graphTarget = $("#mycanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'line',
                            data: chartdata
                        });
                    });
            }
        }

        var w = window.innerWidth;
    var h = window.innerHeight - 40;
    console.log("Running" + h);
    height_Graph = (50 / 100) * h;
    height_Graph_low = (35 / 100) * h;
    function setSize() {
      document.getElementById("Board").style.height = h + "px";
      document.getElementById("graph_block").style.height = height_Graph + "px";
      document.getElementById("graph_block_low").style.height = height_Graph_low + "px";
    }


            document.getElementById("dash").onclick = function gotoNextRules1() {
                location.href = "dashboard.php";
            };
            document.getElementById("trade").onclick = function gotoNextRules2() {
                location.href = "trading.php";
            };
            document.getElementById("rules").onclick = function gotoNextRules3() {
                location.href = "later_rules.html";
            };
            document.getElementById("lead").onclick = function gotoNextRules4() {
                location.href = "leaderboard.php";
            };
        </script>
</body>

</html>