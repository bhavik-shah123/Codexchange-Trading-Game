<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
    <title>CodeXchange</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <style>
        html {
            background-color: #141625;
        }

        b {
            font-family: poppins;
        }

        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #main {
            background-color: #30344f;
            display: flex;
            margin: 0;
            height: 43px;
            justify-content: space-between;
            padding: 22px;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            /*background-color: #141625;*/
            background-color: #141625;
            height: 200%;
            padding: 20px;
        }

        .list {
            background-color: #30344f;
            width: 220%;
            padding-left: 1.4%;
            margin: 10px;
            line-height: 75px;
            font-size: 30px;
            border-radius: 10px;
            overflow: auto;
        }

        table {
            font-family: poppins;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: left;
            color: #ffffff;
            font-size: 22px;
            font-family: poppins;
            font-weight: 100;
            font-stretch: normal;
            font-style: normal;
        }

        .Graph {
            width: 100%;
            height: 82.5%;
            padding-left: 1.4%;
            margin: 10px;
            line-height: 75px;
            font-size: 30px;
            color: aliceblue;
            overflow: auto;
        }

        #trow {
            font-size: 24px;
        }

        .graph {
            background-color: #30344f;
            width: 100%;
            height: 120vh;
            padding-left: 1%;
            line-height: 75px;
            font-size: 35px;
            border-radius: 10px;
            justify-content: center;
            align-self: center;
            display: flex;
            widows: 100%;
            height: auto;
            text-align: center;
            flex-direction: column;
            font-weight: 800;
            font-family: poppins;
        }
        
        #main div {
            font-size: 1.65em;
            padding: 5px;
            font-family: poppins
        }

        .Your_Pos {
            background-color: #30344f;
            width: 100%;
            height: 20%;
            margin-top: 20px;
            padding-left: 5px;
            line-height: 75px;
            font-size: 30px;
            border-radius: 10px;
            overflow: auto;
        }

        .t2 {
            font-size: 30px;
        }

        .t1 {
            font-size: 20px;
            padding: 0px;
        }

        .Line-11 {
            width: 50px;
            height: 0;
            border: solid 5px #ffffff;
        }
    </style>
</head>

<body style="margin: 0;height: 100%;" onLoad="setSize()">
    <script>
        function display() {
            alert("working");
        }
    </script>
    <div id="main">
        <div></div>
        <div style="color:white" id="dash">Dashboard</div>
        <div style="color:#ffffff" id="trade">Trading</div>
        <div style="color:white" id="rules">Rules</div>
        <div style="color:#21e6c1;font-weight: 800" id="lead">Leaderboard</div>
        <div id="hamburger"><a href=""><img src="HamburgerMenu.png" height="30px"></a></div>
    </div>
    <div class="flex-container">
        <div class="list" id="Board">
            <table class="t2">

                <tr>
                    <th>Position</th>
                    <th>Team Name</th>
                    <th>Current Balance</th>
                    <th>Difference in Balance</th>

                </tr>
                <?php
                        $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM balance ORDER BY diff_balance DESC";
                        $result = $conn->query($sql);
                        $rank=1;
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$rank."</td><td>" . $row["team_name"]. "</td><td>" . $row["current_balance"] . "</td><td>"
                            . $row["diff_balance"]. "</td></tr>";
                            $rank++;
                        }
                        echo "</table>";
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
            </table>

        </div>
        <div class="Graph">
            <div class="graph" id="graph_block">
            <canvas id="mycanvas" height=375px></canvas>
            </div>
            <div class="Your_Pos" id="graph_block_low">
                <b>Your Position</b>
                <table class="t1">
                    <tr>
                        <td>Round 1st - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round1"];
                            }
                            ?></td>
                        <td>Round 2nd - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round2"];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>Round 3rd - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round3"];
                            }
                            ?></td>
                        <td>Round 4th - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round4"];
                            }
                            ?></td>

                    </tr>
                    <tr>
                        <td>Round 5th - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round5"];
                            }
                            ?></td>
                        <td>Round 6th - <?php
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
                            $sql1="SELECT * FROM leaderboard_history WHERE team_id='$id'";
                            $res=$conn->query($sql1);
                            while($row1 = $res->fetch_assoc())
                            {
                                echo $row1["round6"];
                            }
                            ?></td>

                    </tr>


                </table>




            </div>
        </div>
    </div>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="Chart.min.js"></script>
    <script>
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
    height_Graph = (58 / 100) * h;
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