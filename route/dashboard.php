
<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");

}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red"> Not Voted<b>';
}
else{
    $status = '<b style="color:green">Voted<b>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        background-color: #f0f2f5;
    }
    #headersection{
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 20px;
        margin: 20px;
    }
    #backbtn, #logout{
        padding: 10px 13px;
        border: none;
        background-color: #4f77ff;
        border-radius: 10px;
        color: white;
    }
    #backbtn a{
        color: white;
        padding: 10px ;
        text-decoration: none;
    }
   #main{
    padding: 30px 40px;
   }
    #main img{
       margin-right: 20px;
    }
    #main #profile{
        width: 27%;
        background-color: white;
        padding: 10px 40px;
        text-align: left;
        float: left;
    }
    #votebtn{

        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        color: white;
        background: red;
        border: none
    }
  
    #main #group{
        background-color: white;
        width: 70%;
        float: right;
        padding: 30px;
        color: black;
       
    }
    #voted{
        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        color: white;
        background: green;
    }
    .one{
        padding: 30px;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .one form, b{
        background-color: white;
       
    }


</style>
<body>
    
<div id="headersection">
<a href="../route/login.html"> <button id="backbtn">Back </button></a>
    <h1>Online Voting System</h1>
    <a href="../api/logout.php">  <button id="logout">Logout</button></a>
</div>
<hr>
<div id="main">
<div id="profile">
<img src="../upload/<?php echo $userdata['image']?>" alt="" height="200" width="200"><br><br>
<b>Name: = </b><?php  echo $userdata['name']?><br><br>
<b>Mobile: = </b><?php  echo $userdata['mobile']?><br><br>
<b>Address: = </b><?php  echo $userdata['address']?><br><br>
<b>Status: = </b><?php  echo $status?><br><br>
</div>
<div id="group">
    
    <?php
    if($_SESSION['groupsdata']){
        for($i=0; $i<count($groupsdata); $i++){
            ?>
            

            <div class="one">
                <img src="../upload/<?php echo $groupsdata[$i]['image']; ?>" height="100" width="100"><br><br>
                <b>Group Name:</b> <?php echo $groupsdata[$i]['name'];?>
                <b>Votes: </b> <?php echo $groupsdata[$i]['votes'];?> 
                <form action="../api/vote.php" method="post">
                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">

                    <?php
                    if($_SESSION['userdata']['status'] == 0){

                        ?>
                        <input type="submit" name="votebtn" value="vote" id="votebtn">
                        <?php
                    }
                    else{
                        ?>
                         <button disabled type="button" name="votebtn" value="vote" id="voted">voted</button>
                    
                        <?php
                    }
                    ?>
                   
                </form>
                

            </div>
            <hr>
            <?php
        }
    }
    else{

    }
    ?>
    
</div>

</div>
</body>
</html>