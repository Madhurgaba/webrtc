<?php
$this->view('./template/header_script_view.php');
$this->view('./template/header_view.php');
$this->view('./template/menu_view.php');
?>
    <body class="fixed-footer">
        <main>
				<header class="page-header">
						<h2>Video Conferencing</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>dashboard">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<!--<li><span>Pages</span></li>
								<li><span>User Profile</span></li>-->
							</ol>
					
							<a class="sidebar-right-toggle"></a>
						</div>
					</header>
                <!-- ===== End Navbar ===== -->


            <div class="all_departaments" style="margin-left: 20%;">
                <div class="container xsx-width">
                    <div class="row" style="margin-top:2%;">
                        <div class="col-md-9" style="width:91.6%;">
                            <div class="all_dp_elements">
							</div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-all">
                                <li class="active">
								   <a href="#consult_doctors" data-toggle="tab">Video Conferencing</a>
								</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tab-content-all">
                                <div class="tab-pane fade" id="sevices">
                                    <!-- ===== Begin Title All Departaments ===== -->
                                    <div class="titleD">
                                        <h4>Patient Information</h4>
                                        <div class="right-linie">
                                            <span></span>
                                        </div>
                                    </div>
                                    <!-- ===== End Title All Departaments ===== -->


                                    <div class="row">
                                        <div class="col-md-12 down-side">
                                           <strong> <p>Patient Information where he has done medical treatment</p>
											<p>Patient Information where he has done Emergency Help</p>
											<p>Patient Information where he has done Medical Diagnose</p></strong>
                                            <button type="button" class="btn btn-default btn-normal btn-4">MAKE AN APPOINTMENT</button>
                                        </div>
                                    </div>
                                    <!-- ===== End Services Details ===== -->
                                </div>
								<div class="tab-pane fade in active" id="consult_doctors">
                                    <!-- ===== Begin Title All Departaments ===== -->
                                    <div class="titleD">
                                        <h4>Doctors</h4>
                                        <div class="right-linie">
                                            <span></span>
                                        </div>
                                    </div>
                                    <!-- ===== End Title All Departaments ===== -->

                                    <!-- ===== Begin Doctors Details ===== -->
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="doctor_filter_elements">
                                                <div class="thumbnail doctor_filter" style="margin-left: 33px;">
                                                    <div class="videoContainer">
														<video id="localVideo" style="height: 150px;" oncontextmenu="return false;"></video>
														<div id="localVolume" class="volume_bar"></div>
													</div>
                                                </div>
                                                <div class="caption_doctor">
                                                    <h4>Dr <?php echo $this->session->userdata('dr_name');?></h4>
                                                    <span>Patient Information</span>
                                                    <p>Talk to Mr. Test Patient with Video Confrencing</p>
                                                </div>
                                            </div>
                                        </div>
			<div class="col-sm-8 col-md-8">
				<div class="doctor_filter_elements">
					<div class="thumbnail doctor_filter" style="margin-left: 13px; height: 450px;">
						 <div id="remotes"></div>
					</div>
					<div class="caption_doctor" style="height: 247px;">
						<p style="padding-bottom: 47px;">
						Talk to Dr. <?php echo $this->session->userdata('dr_name');?> with Video Confrencing</p>
						<p id="subTitle"></p>
					  <!-- <button id="screenShareButton" class="btn btn-default btn-normal btn-4" style="float: left;margin-left: 20px;">share screen</button>-->
						 <form id="createRoom">
						   <input id="sessionInput"/>
						<button type="submit" id="screenShareButton" class="btn btn-default btn-normal btn-4">
						Create it!
						</button>
						  </form>
					</div>
				</div>
			</div>
           </div>
	</div>
							<div class="tab-pane fade" id="doctors"> 
							   <div class="comment depth-1">
											<div class="left-section">
                                                <img class="object" src="<?php echo base_url(); ?>assets/img/awesome_team-2.jpg" style="width:78px;height:80px;">  
                                            </div>

                                            <div class="right-section">
                                                <h4><a href="#">Emilia Iama</a> <span>- 13 hours ago</span></h4>
                                                <div class="clear"></div>
                                                <div class="comment-text">
                                                    <p>
                                                       Doctors Feedback Review Description.<br>
                                                    </p>
                                                </div>
                                            </div>
											<img style="margin-left: 100px;" src="https://s3-aws-plyb.s3-ap-southeast-1.amazonaws.com/imgs/dt/tp/587180503eda2b28e4bbb1026e88dda4/0c22bf8cf7bee2ff1954ce89e9eafd54/863ad8.jpg">
                                            <div class="clear"></div>
                                        </div>
							   
							   
							   </div>
                            </div>
                        </div>
                        <!-- ===== End All Sections ===== -->
                    </div>
                </div>
            </div>
            <!-- ================================ -->
            <!-- ========== End All Departaments ========== -->
            <!-- ================================ -->
        <style>
            .videoContainer {
                position: relative;
                width: 200px;
                height: 150px;
            }
            .videoContainer video {
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .volume_bar {
                position: absolute;
                width: 5px;
                height: 0px;
                right: 0px;
                bottom: 0px;
                background-color: #12acef;
            }
        </style>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/webrtc/simplewebrtc.bundle.js"></script>
        <script>
            // grab the room from the URL
            var room = location.search && location.search.split('?')[1];

            // create our webrtc connection
            var webrtc = new SimpleWebRTC({
                // the id/element dom element that will hold "our" video
                localVideoEl: 'localVideo',
                // the id/element dom element that will hold remote videos
                remoteVideosEl: '',
                // immediately ask for camera access
                autoRequestMedia: true,
                debug: false,
                detectSpeakingEvents: true,
                autoAdjustMic: false
            });

            // when it's ready, join if we got a room from the URL
            webrtc.on('readyToCall', function () {
                // you can name it anything
                if (room) webrtc.joinRoom(room);
            });

            function showVolume(el, volume) {
                if (!el) return;
                if (volume < -45) { // vary between -45 and -20
                    el.style.height = '0px';
                } else if (volume > -20) {
                    el.style.height = '100%';
                } else {
                    el.style.height = '' + Math.floor((volume + 100) * 100 / 25 - 220) + '%';
                }
            }
            webrtc.on('channelMessage', function (peer, label, data) {
                if (data.type == 'volume') {
                    showVolume(document.getElementById('volume_' + peer.id), data.volume);
                }
            });
            webrtc.on('videoAdded', function (video, peer) {
                console.log('video added', peer);
                var remotes = document.getElementById('remotes');
                if (remotes) {
                    var d = document.createElement('div');
                    d.className = 'videoContainer';
                    d.id = 'container_' + webrtc.getDomId(peer);
                    d.appendChild(video);
                    var vol = document.createElement('div');
                    vol.id = 'volume_' + peer.id;
                    vol.className = 'volume_bar';
                    video.onclick = function () {
                        video.style.width = video.videoWidth + 'px';
                        video.style.height = video.videoHeight + 'px';
                    };
                    d.appendChild(vol);
                    remotes.appendChild(d);
                }
            });
            webrtc.on('videoRemoved', function (video, peer) {
                console.log('video removed ', peer);
                var remotes = document.getElementById('remotes');
                var el = document.getElementById('container_' + webrtc.getDomId(peer));
                if (remotes && el) {
                    remotes.removeChild(el);
                }
            });
            webrtc.on('volumeChange', function (volume, treshold) {
                //console.log('own volume', volume);
                showVolume(document.getElementById('localVolume'), volume);
            });

            // Since we use this twice we put it here
            function setRoom(name) {
                $('form').remove();
                $('h1').text(name);
                $('#subTitle').text('Link to join: ' + location.href);
                $('body').addClass('active');
            }

            if (room) {
                setRoom(room);
            } else {
                $('form').submit(function () {
                    var val = $('#sessionInput').val().toLowerCase().replace(/\s/g, '-').replace(/[^A-Za-z0-9_\-]/g, '');
                    webrtc.createRoom(val, function (err, name) {
                        console.log(' create room cb', arguments);
                    
                        var newUrl = location.pathname + '?' + name;
                        if (!err) {
                            history.replaceState({foo: 'bar'}, null, newUrl);
                            setRoom(name);
                        } else {
                            console.log(err);
                        }
                    });
                    return false;          
                });
            }

            var button = $('#screenShareButton'),
                setButton = function (bool) {
                    button.text(bool ? 'share screen' : 'stop sharing');
                };
            webrtc.on('localScreenStopped', function () {
                setButton(true);
            });

            setButton(true);

            button.click(function () {
                if (webrtc.getLocalScreen()) {
                    webrtc.stopScreenShare();
                    setButton(true);
                } else {
                    webrtc.shareScreen(function (err) {
                        if (err) {
                            setButton(true);
                        } else {
                            setButton(false);
                        }
                    });
                    
                }
            });
        </script>
		
		<!-- Vendor -->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		             
		
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/fullcalendar/lib/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.js"></script>
		             
		
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.js"></script>
		             
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.custom.js"></script>
		             
		
		<script src="<?php echo base_url(); ?>assets/javascripts/theme.init.js"></script>
                     
		<script src="<?php echo base_url(); ?>assets/javascripts/pages/examples.calendar.js"></script>
 </main>
