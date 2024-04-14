<?php include('header.php'); 
if(isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Retrieve user ID from session
}
?>
<div class="user-main-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="total-log box-class">
                    <h3>Total time log</h3>
                    <div class="deatail">
                        <?php 
                            //Sql Query 
                            $sqltotaltime = "SELECT SUM(time) AS total_hours FROM tbl_time WHERE uid = $userId";
                            //Execute Query
                            $restotaltime = mysqli_query($conn, $sqltotaltime);
                            $rowtotal = mysqli_fetch_assoc($restotaltime);
                            $seconds = $rowtotal['total_hours'];
                            $hour = $rowtotal['total_hours']/3600;
                        ?>
                        <span class="total-hour"><?php echo number_format($hour,1); ?></span>
                        hrs
                    </div>
                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_time WHERE uid = $userId";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>
                    <p class="sub-text">across <?php echo $count; ?> count</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="salary box-class">
                    <?php 
                        //Sql Query 
                        $sqlemp = "SELECT employeetype FROM tbl_admin WHERE id = $userId";
                        //Execute Query
                        $resemp = mysqli_query($conn, $sqlemp);
                        //Count Rows
                        $rowtype = mysqli_fetch_assoc($resemp);
                        $emptype = $rowtype['employeetype'];
                        
                        $sqlsalary = "SELECT salary FROM tbl_employeetype WHERE id = $emptype";
                        //Execute Query
                        $ressalary = mysqli_query($conn, $sqlsalary);
                        //Count Rows
                        $rowsalary = mysqli_fetch_assoc($ressalary);
                        $salary = $rowsalary['salary'];
                    ?>
                    <h3>Total Billable</h3>
                    <div class="deatail">
                        <span class="total-hour">$<?php echo number_format($salary*$hour,2);?></span>
                    </div>
                    <p class="sub-text">$<?php echo $salary; ?>/hr</p>
                </div>  
            </div>
            <div class="col-lg-3">
                <div class="leave box-class">
                    <h3>Total Leave</h3>
                    <div class="deatail">
                        <span class="total-hour">35</span>
                    </div>
                    <p class="sub-text">out of 3</p>
                </div> 
            </div>
            <div class="col-lg-3">
                <div class="help box-class">
                    <h3>Get Help</h3>
                </div> 
            </div>
        </div>
    </div>
</div>

<style>
    .box-class {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        border: 1px solid #cfdde9;
    }

    .box-class h3 {
        font-size: 0.875rem;
        color: #002838;
        line-height: 24px;
        font-weight: 700;
    }

    p.sub-text {
        color: #264856;
        font-size: 0.775rem;
        margin: 0;
        line-height: 20px;
    }

    .box-class .total-hour {
        font-size: 32px;
        font-weight: 800;
        display: inline;
        line-height: 24px;
        margin-bottom: 4px;
    }

    .box-class .deatail {
        line-height: 24px;
        font-size: 16px;
        font-weight: 600;
        display: inline;
    }

</style>
