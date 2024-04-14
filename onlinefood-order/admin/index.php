<?php include('../user/header.php'); ?>
<div class="admin-dashboard">
    <div class="wrapper">
        <div class="nav-menu">
            <div class="menu-wrap">
                <div class="menu-listing">
                    <ul class="list">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Employee</a></li>
                        <li><a href="#">Leave Request</a></li>
                        <li><a href="#">Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-body">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-section">
                            <div class="leave-section">
                                <h3>Requested Leave</h3>
                                <div class="request-list">
                                    <ul>
                                        <?php 
                                        //Display Foods that are Active
                                        $leavesql = "SELECT * FROM tbl_leave";
                                        //Execute the Query
                                        $leaveres=mysqli_query($conn, $leavesql);
                                        //Count Rows
                                        $count = mysqli_num_rows($leaveres);
                                        //CHeck whether the foods are availalable or not
                                        if($count>0)
                                        {
                                            //Foods Available
                                            while($row=mysqli_fetch_assoc($leaveres))
                                            {
                                                //Get the Values
                                                $uid = $row['uid'];
                                                $namesql = "SELECT full_name FROM tbl_admin WHERE id = $uid";
                                                $nameres = mysqli_query($conn, $namesql);
                                                //Count Rows
                                                $rowname = mysqli_fetch_assoc($nameres);
                                        ?>
                                        <li class="<?php if($row['approved']==1){ echo 'approved';} ?>">
                                            <a href="<?php if($row['approved']==1){ echo '#'; }else{ echo SITEURL; ?>admin/update-leaverequest.php?id=<?php echo $row['id']; } ?>">
                                                <div class="left">
                                                    <span class="name"><?php echo $rowname['full_name']; ?></span>
                                                </div>
                                                <div class="right">
                                                    <span class="des"><?php echo $row['reason'];?></span>
                                                    <span class="date"><?php echo $row['date'];?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-section">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
