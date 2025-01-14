<?php
include("assets/header.php");
include("assets/sideBar.php");
?>
     <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
<div class="container-fluid">
				<!-- Add Project -->
				<div class="modal fade" id="addProjectSidebar">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Project</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Project Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Deadline</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Client Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <strong class="profileUserName"></strong>, welcome back!</h4>
                            <p class="mb-0">Empowering Creativity, One Idea at a Time</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head" style="position:relative; ">
								
									<label style="position:absolute; z-index:100; padding:20px 25px; cursor:pointer; background-color:#fff; right:20px; bottom:120px; border-radius:50%; font-size:20px;" class="text-primary" for="updateCover"><i class="fas fa-camera"></i></label>
									<input  id="updateCover" hidden type="file">
						
                                <div class="photo-content coverImage" style="height:40vh; overflow:hidden;">
                                </div>
                                <div class="profile-info">
									<div style="width: 100px !important;  border-radius:50%; display:flex; justify-content:center; align-items:center; height:92px !important; overflow:hidden;" class="profile-photo">
                                        <label class="text-primary" style="cursor: pointer; font-size:10px !important; padding:5px 7.5px; border:1px solid grey; background-color:#fff; position:absolute; bottom:8px;  right:5px; border-radius:50%;" for="updateProfile"><i class="fas fa-edit"></i></label>
                                        <input  hidden id="updateProfile" type="file">
										<img width="100%" height="100%" class="profileImage"  alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4  class="text-primary mb-0 profileUserName" ></h4>
											<p class="profileUserRole"></p>
										</div>
										<!-- <div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="670e09010827021f060a170b024904080a">[email&#160;protected]</a></h4>
											<p>Email</p>
										</div> -->
										<!-- <div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
											</ul>
										</div> -->
										<div class="row ml-auto">
											<div class="col-12">
												<h1 class="text-center">20</h1>
												<h4>Follow</h4>
											</div>
										</div>
										<div class="row ml-auto">
											<div class="col-12">
												<h1 class="text-center">20</h1>
												<h4>Follow</h4>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <!-- <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Posts</a> -->
                                            </li>
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
											<div id="about-me" class="tab-pane fade active show">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <h4 class="text-primary">About Me</h4>
                                                        <Is class="mb-2">My Name Is <strong class="profileUserName"></strong> My Email Is <strong class="profileUserEmail"></strong> I Am <strong class="profileUserRole"></strong> In This System</Is>
                                                        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Skills</h4>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                                </div>
                                                <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Language</h4>
													<a href="javascript:void(0);" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
													<a href="javascript:void(0);" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                    <a href="javascript:void(0);" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                </div> -->
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500 ">Name <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7 profileUserName"><span></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7 profileUserEmail"><span><img width="50px" src="images/typ.webp" alt="loading.."></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Role <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7 profileUserRole"><span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form id="accountUpdate">
                                                            <p class="text-danger">To Change Your Account You Must Enter Your Current Password!</p>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Full Name</label>
                                                                    <input type="text" id="fullName" name="fullName" placeholder="Full Name" class="form-control userNameAsValue">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Email</label>
                                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control emailAsValue">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Current Password</label>
                                                                    <input type="text" id="currentPassword" name="currentPassword" placeholder="Current Password" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>New Password</label>
                                                                    <input type="text" id="newPassword" name="newPassword" placeholder="New Password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
			<style>
             
                .is-invalid {
    border: 1px solid red !important;
}
.error-message {
    font-size: 0.9em;
    margin-top: 5px;
    display: block;
}

            </style>
<?php
include("assets/footer.php");
?>
