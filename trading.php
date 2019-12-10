<!DOCTYPE html>
<?php 
session_start();
?>
<html>

<head>
    <title>Codexchange</title>
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

        .card1 {
            border-radius: 25px;
            background-color: #30344f;
            color: #ffffff;
            font-family: Poppins;
            font-family: Poppins;
            font-weight: 400;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.51;
            letter-spacing: normal;
            text-align: left;
            color: #ffffff;
        }

        .rightcolumn {
            float: left;
            width: 31%;
            background-color: #141625;
            padding-left: 3.2%;
            padding-top: 3.1%;
            border-radius: 25px;
        }


        #buy {
            width: 70px;
            height: 1em;
        }

        input,
        select,
        textarea {
            color: #ffffff;
            text-align: center;
        }

        #b2 {
            border-color: red;
            border-radius: 25px;
            height: 115px;
            font-weight: 500;
            font-size: 25px;
            font-family: Poppins;
            color: red;
            background: transparent;
            width: 100%;
        }

        #customers {
            font-family: Poppins;
            border-collapse: collapse;
            font-weight: 400;
            font-size: 24px;
        }

        #customers td {
            border: 0px;
            line-height: 3.2%;
            text-align: center;
            height: 50px;
        }

        #customers th {
            text-align: center;
            color: white;
        }

        #merger {
            margin-bottom: 110px;
            border: 0px;
        }

        #merger th {
            text-align: center;
        }

        #ex {
            border-radius: 5px;
            border: none;
            color: #30344f;
            font-weight: 600;
            font-family: Poppins;
            background-color: #21e6c1;
            height: 1.7rem;
        }

        .title1 {
            width: 9.4%;
            height: 4.6%;
            font-family: Poppins;
            left: 79.5%;
            top: 16.5%;
            padding-right: 11.4%;
            bottom: 79%;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.51;
            letter-spacing: normal;
            color: #ffffff;
        }

        #calc{
            background-color:#30344f;
            border-radius: 25px;
            font-family: Poppins;
            color: #ffffff; 
        }
    </style>
</head>
<?php
    extract($_POST);
    $spend=0;
    if(isset($save)){
        $spend=$fn*$sn;
    }
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
                                $bal=$row1["current_balance"];
                            }
    if($spend>$bal)
    {
        $res = "Earn some more";
    }
    else{
        $res="Go ahead!!";
    }

    ?>

<body>
    <div id="main">
        <div></div>
        <div style="color:white" id="dash">Dashboard</div>
        <div style="color:#21e6c1;font-weight: 800" id="trade">Trading</div>
        <div style="color:white" id="rules">Rules</div>
        <div style="color:white" id="lead">Leaderboard</div>
        <div id="hamburger"><a href=""><img src="HamburgerMenu.png" height="30px"></a></div>
    </div>

    <div class="row">
        <div class="leftcolumn">
            <div class="card1">
                <table id="customers">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stocks Available</th>

                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost", "root", "bhavik", "codexchange");
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT username,current_price,avail_stocks FROM trade";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["username"]. "</td><td>" . $row["current_price"] . "</td><td>"
                        . $row["avail_stocks"]. "</td></tr>";
                        }
                        echo "</table>";
                        } else { echo "0 results"; }
                        $conn->close();
                    ?>
                </table>
            </div>
        </div>
        <div class="rightcolumn">
            <div id="calc">
            <form method="post">
            <table border="1" align="center">
			<tr>
				<th>Your Result</th>
				<th><input type="text" readonly="readonly" disabled="disabled" style="font-family:Poppins;color:#ffffff;" value="<?php  echo @$res;?>"/></th>
			</tr> 
			
			<tr>
				<th>Enter the number of stocks you want to buy</th>
				<th><input type="number" name="fn" value="<?php  echo @$fn;?>"/></th>
			</tr> 
			<tr>
				<th>Enter the price at which you want to buy</th>
				<th><input type="number" name="sn" value="<?php  echo @$sn;?>"/></th>
			</tr>
            <tr>
				<th colspan="2">
				<input type="submit" 
				name="save" value="Show Result" style="background-color: #141625;"/>
                </th>
			</tr>
		    </table>
		    </form>
            </div>
            
        </div>
    </div>
    

    <script type="text/javascript">

        document.getElementById("dash").onclick = function gotoNextRules1() {
            location.href = "dashboard.php";
        };
        document.getElementById("trade").onclick = function gotoNextRules2() {
            location.href = "trading.html";
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