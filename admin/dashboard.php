 
<?php 

     require 'header.php';     
	 
?>
   

<?php
        
        $page="dashboard";
		
		 $companycount=getcompany($link);
		$pendingreq=pendingreq($link);
		$approve=approve($link);
		 
?>
 
  <body>
<div class="content" >
    <h1 style="text-align:center;color:blue"> Portfolio Creator</h1>
 
                
               <div id="status">
                    <div id="faculty" class="info-box status-item">
                        <div class="heading">
                            <h5> Users</h5>
                            <div class="info">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                        </div>
                        <div class="info-content text-primary">
                            <p>Total Users</p>
                            <p class="num "  >
                                <?php 
                                 echo count($approve) ;
                                ?>
                            </p>
                        </div>
                        <a href="user.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="student" class="info-box status-item">
                        <div class="heading">
                            <h5>Comapny Admin</h5>
                            <div class="info">
                                <i class="fas fa-bus"></i>
                            </div>
                        </div>
                        <div class="info-content text-success">
                            <p>Total Company Admin</p>
                            <p class="num" data-target="<?php 
                                     
                                ?>">
                                <?php 
                                 echo count($pendingreq) ;
                                ?>
                            </p>
                        </div>
                        <a href="pending.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
					 <div id="course" class="info-box status-item">
                        <div class="heading">
                            <h5>company</h5>
                            <div class="info">
                                <i class="fas fa-road"></i>
                            </div>
                        </div>
                        <div class="info-content text-danger">
                            <p>Total company</p>
                            <p class="num" data-target="<?php 
                                      
                                ?>">
                                <?php 
                                    echo count($companycount) ; 
                                ?>
                            </p>
                        </div>
                        <a href="viewcompany.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
					 
					
					</div>
					</body>