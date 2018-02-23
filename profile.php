<?php include "config.php" ?>
<?php include "header.php" ?>
<?php include "menu.php" ?>
<?php
//Connect to BDD
try{
    $bdd = new PDO('mysql:host='.$MYSQL_HOST.';dbname='.$MYSQL_DB.';charset=utf8',$MYSQL_USER,$MYSQL_PASS);
}
catch(Exception $e){
     die('Erreur : '.$e->getMessage());
}
$id=$_SESSION['id'];
// Retrieving User Information.
$query=$bdd->query("SELECT * FROM members WHERE id = '$id'");
$user=$query->fetch();
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My profile</li>
      </ol>
    <div id="user-profile-2" class="user-profile">
		<div class="tabbable">

			<div class="tab-content no-border padding-24">
				<div id="home">
					<div class="row">
						<div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture">
								<img class="editable img-responsive" alt=" Avatar" id="avatar2" src="http://bootdey.com/img/Content/avatar/avatar6.png">
							</span>

							<div class="space space-4"></div>

							<a href="#" class="btn btn-sm btn-block btn-success">
								<i class="ace-icon fa fa-plus-circle bigger-120"></i>
								<span class="bigger-110">Edit profile</span>
							</a>

						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-9">
							<h4 class="blue">
								<span class="middle"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?></span>
							</h4>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Firstname </div>

									<div class="profile-info-value">
										<span><?php echo $_SESSION['firstname'];?></span>
									</div>
								</div>
								<div class="profile-info-row">
									<div class="profile-info-name"> Lastname </div>

									<div class="profile-info-value">
										<span><?php echo $_SESSION['lastname'];?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Email </div>

									<div class="profile-info-value">										
										<span><?php echo $user['email'];?></span>

									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Joined </div>

									<div class="profile-info-value">
										<span><?php echo $user['date_signup'];?></span>
									</div>
								</div>

							</div>

							<div class="hr hr-8 dotted"></div>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Website </div>

									<div class="profile-info-value">
										<a href="#" target="_blank">www.temp.com</a>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="#">Find me on Facebook</a>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">
										<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
									</div>

									<div class="profile-info-value">
										<a href="#">Follow me on Twitter</a>
									</div>
								</div>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->

					<div class="space-20"></div>
				</div><!-- /#home -->



			</div>
		</div>
	</div>


 

        </div>
      </div>
      </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include "footer.php" ?>
