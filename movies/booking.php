<!DOCTYPE html>
<html lang="en">
<?php
$id = $_GET['id'];
//conditions
if ((!$_GET['id'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}
include "connection.php";
$movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movieTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
    <link rel="stylesheet" href="style.css">
    
    <style>
      
    </style>
</head>

<body style="background-color:black;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movieImg'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENGRE</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>DIRECTOR</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>ACTORS</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                        <option value="7d">7D</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">May 15,2021</option>
                        <option value="13-3">May 16,2021</option>
                        <option value="14-3">May 17,2021</option>
                        <option value="15-3">May 18,2021</option>
                        <option value="16-3">May 19,2021</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>

                    
					<input type="text" name="fName" placeholder="First Name " required="">
					<input type="text" name="lName" placeholder="Last Name " required="">
					<input type="varchar" name="pNumber" placeholder="Phone Number " required="">

          
                    
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">



                    <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>

                </form>
            </div>
        </div>
    </div>
     
     
    <div class="movie-container">
      <label style="font-size: 1em;">Pick a seat:</label>
      <select id="movie">
        
      </select>
    </div>

    <ul class="showcase">
      <li>
        <div id="seat" class="seat"></div>
        <small class="status" style="font-size: 1em;">N/A</small>
      </li>
      <li>
        <div id="seat" class="seat selected"></div>
        <small class="status" style="font-size: 1em;">Selected</small>
      </li>
      <li>
        <div id="seat" class="seat occupied"></div>
        <small class="status" style="font-size: 1em;">Occupied</small>
      </li>
    </ul>

    <div class="container">
      <div class="screen"></div>

      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
      </div>
      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
      </div>
      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat occupied"></div>
      </div>
      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
      </div>
      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
      </div>
      <div class="row">
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat occupied"></div>
        <div id="seat" class="seat"></div>
      </div>
    </div>

    <p class="text" style="font-size: 1em;margin:0px 0px 15px 0px">
      You have selected <span id="count">0</span>out of 4
      
    </p>

    

    <script>
     
      var count=0;
      var seats=document.getElementsByClassName("seat");
      for(var i=0;i<seats.length;i++){
        var item=seats[i];
        
        item.addEventListener("click",(event)=>{
          var price= document.getElementById("movie").value;

          if (!event.target.classList.contains('occupied') && !event.target.classList.contains('selected') ){
          count++;
          
          var total=count*price;
          event.target.classList.add("selected");
          document.getElementById("count").innerText=count;
          document.getElementById("total").innerText=total;

          }
        })
      }
    </script>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>