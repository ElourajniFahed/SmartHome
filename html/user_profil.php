<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<style type="text/css">




/****** Searchable container */

.title{
 margin-left:20px
}

.fa-user{
 font-size:80px   
}

.searchable-container{
    margin-top:40px;
}

.glyphicon-lg{
    font-size:4em
}
.info-block{
    border-right:5px solid #E6E6E6;margin-bottom:25px
}
.info-block .square-box {
    width:120px;
    min-height:120px;
    margin-right:22px;
    text-align:center!important;
    background-color:#676767;
    padding:20px 0
}
.info-block:hover .info-block.block-info {
    border-color:#20819e
}

.info-block.block-info .square-box {
    background-color:#5bc0de;
    color:#FFF
}






/*   */

body{margin-top:20px;
background:#eee;
}

.btn-compose-email {
    padding: 10px 0px;
    margin-bottom: 20px;
}

.btn-danger {
    background-color: #E9573F;
    border-color: #E9573F;
    color: white;
}

.panel-teal .panel-heading {
    background-color: #37BC9B;
    border: 1px solid #36b898;
    color: white;
}

.panel .panel-heading {
    padding: 5px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom: 1px solid #DDD;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
}

.panel .panel-heading .panel-title {
    padding: 10px;
    font-size: 17px;
}

form .form-group {
    position: relative;
    margin-left: 0px !important;
    margin-right: 0px !important;
}

.inner-all {
    padding: 10px;
}

/* ========================================================================
 * MAIL
 * ======================================================================== */
.nav-email > li:first-child + li:active {
  margin-top: 0px;
}
.nav-email > li + li {
  margin-top: 1px;
}
.nav-email li {
  background-color: white;
}
.nav-email li.active {
  background-color: transparent;
}
.nav-email li.active .label {
  background-color: white;
  color: black;
}
.nav-email li a {
  color: black;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  border-radius: 0px;
}
.nav-email li a:hover {
  background-color: #EEEEEE;
}
.nav-email li a i {
  margin-right: 5px;
}
.nav-email li a .label {
  margin-top: -1px;
}

.table-email tr:first-child td {
  border-top: none;
}
.table-email tr td {
  vertical-align: top !important;
}
.table-email tr td:first-child, .table-email tr td:nth-child(2) {
  text-align: center;
  width: 35px;
}
.table-email tr.unread, .table-email tr.selected {
  background-color: #EEEEEE;
}
.table-email .media {
  margin: 0px;
  padding: 0px;
  position: relative;
}
.table-email .media h4 {
  margin: 0px;
  font-size: 14px;
  line-height: normal;
}
.table-email .media-object {
  width: 35px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}
.table-email .media-meta, .table-email .media-attach {
  font-size: 11px;
  color: #999;
  position: absolute;
  right: 10px;
}
.table-email .media-meta {
  top: 0px;
}
.table-email .media-attach {
  bottom: 0px;
}
.table-email .media-attach i {
  margin-right: 10px;
}
.table-email .media-attach i:last-child {
  margin-right: 0px;
}
.table-email .email-summary {
  margin: 0px 110px 0px 0px;
}
.table-email .email-summary strong {
  color: #333;
}
.table-email .email-summary span {
  line-height: 1;
}
.table-email .email-summary span.label {
  padding: 1px 5px 2px;
}
.table-email .ckbox {
  line-height: 0px;
  margin-left: 8px;
}
.table-email .star {
  margin-left: 6px;
}
.table-email .star.star-checked i {
  color: goldenrod;
}

.nav-email-subtitle {
  font-size: 15px;
  text-transform: uppercase;
  color: #333;
  margin-bottom: 15px;
  margin-top: 30px;
}

.compose-mail {
  position: relative;
  padding: 15px;
}
.compose-mail textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #DDD;
}

.view-mail {
  padding: 10px;
  font-weight: 300;
}

.attachment-mail {
  padding: 10px;
  width: 100%;
  display: inline-block;
  margin: 20px 0px;
  border-top: 1px solid #EFF2F7;
}
.attachment-mail p {
  margin-bottom: 0px;
}
.attachment-mail a {
  color: #32323A;
}
.attachment-mail ul {
  padding: 0px;
}
.attachment-mail ul li {
  float: left;
  width: 200px;
  margin-right: 15px;
  margin-top: 15px;
  list-style: none;
}
.attachment-mail ul li a.atch-thumb img {
  width: 200px;
  margin-bottom: 10px;
}
.attachment-mail ul li a.name span {
  float: right;
  color: #767676;
}

@media (max-width: 640px) {
  .compose-mail-wrapper .compose-mail {
    padding: 0px;
  }
}
@media (max-width: 360px) {
  .mail-wrapper .panel-sub-heading {
    text-align: center;
  }
  .mail-wrapper .panel-sub-heading .pull-left, .mail-wrapper .panel-sub-heading .pull-right {
    float: none !important;
    display: block;
  }
  .mail-wrapper .panel-sub-heading .pull-right {
    margin-top: 10px;
  }
  .mail-wrapper .panel-sub-heading img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 10px;
  }
  .mail-wrapper .panel-footer {
    text-align: center;
  }
  .mail-wrapper .panel-footer .pull-right {
    float: none !important;
    margin-left: auto;
    margin-right: auto;
  }
  .mail-wrapper .attachment-mail ul {
    padding: 0px;
  }
  .mail-wrapper .attachment-mail ul li {
    width: 100%;
  }
  .mail-wrapper .attachment-mail ul li a.atch-thumb img {
    width: 100% !important;
  }
  .mail-wrapper .attachment-mail ul li .links {
    margin-bottom: 20px;
  }

  .compose-mail-wrapper .search-mail input {
    width: 130px;
  }
  .compose-mail-wrapper .panel-sub-heading {
    padding: 10px 7px;
  }
}










/*font Awesome http://fontawesome.io*/
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
/*Comment List styles*/
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}







/**** resumee ****/
                    
    /* uses font awesome for social icons */
@import url(http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

.page-header{
  text-align: center;    
}

/*social buttons*/
.btn-social{
  color: white;
  opacity:0.9;
}
.btn-social:hover {
  color: white;
    opacity:1;
}
.btn-facebook {
background-color: #3b5998;
opacity:0.9;
}
.btn-twitter {
background-color: #00aced;
opacity:0.9;
}
.btn-linkedin {
background-color:#0e76a8;
opacity:0.9;
}
.btn-github{
  background-color:#000000;
  opacity:0.9;
}
.btn-google {
  background-color: #c32f10;
  opacity: 0.9;
}
.btn-stackoverflow{
  background-color: #D38B28;
  opacity: 0.9;
}

/* resume stuff */

.bs-callout {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #eee;
    border-image: none;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px 1px 1px 5px;
    margin-bottom: 5px;
    padding: 20px;
}
.bs-callout:last-child {
    margin-bottom: 0px;
}
.bs-callout h4 {
    margin-bottom: 10px;
    margin-top: 0;
}

.bs-callout-danger {
    border-left-color: #d9534f;
}

.bs-callout-danger h4{
    color: #d9534f;
}

.resume .list-group-item:first-child, .resume .list-group-item:last-child{
  border-radius:0;
}

/*makes an anchor inactive(not clickable)*/
.inactive-link {
   pointer-events: none;
   cursor: default;
}

.resume-heading .social-btns{
  margin-top:15px;
}
.resume-heading .social-btns i.fa{
  margin-left:-5px;
}



@media (max-width: 992px) {
  .resume-heading .social-btn-holder{
    padding:5px;
  }
}


/* skill meter in resume. copy pasted from http://bootsnipp.com/snippets/featured/progress-bar-meter */

.progress-bar {
    text-align: left;
    white-space: nowrap;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	cursor: pointer;
}

.progress-bar > .progress-type {
	padding-left: 10px;
}

.progress-meter {
	min-height: 15px;
	border-bottom: 2px solid rgb(160, 160, 160);
  margin-bottom: 15px;
}

.progress-meter > .meter {
	position: relative;
	float: left;
	min-height: 15px;
	border-width: 0px;
	border-style: solid;
	border-color: rgb(160, 160, 160);
}

.progress-meter > .meter-left {
	border-left-width: 2px;
}

.progress-meter > .meter-right {
	float: right;
	border-right-width: 2px;
}

.progress-meter > .meter-right:last-child {
	border-left-width: 2px;
}

.progress-meter > .meter > .meter-text {
	position: absolute;
	display: inline-block;
	bottom: -20px;
	width: 100%;
	font-weight: 700;
	font-size: 0.85em;
	color: rgb(160, 160, 160);
	text-align: left;
}

.progress-meter > .meter.meter-right > .meter-text {
	text-align: right;
}


    
                        
/**** resume ****/
  </style>

<?php
mysqli_close($conn);

include('navbar1.php');
mysqli_close($conn);

?>
<style>
h4,h3{background-color:	#B22222;
color:#000000;
}
</style>
<body>
<form name='f1' method='post' action=''>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-sm-3">
        <a href="#" class="btn btn-danger btn-block btn-compose-email">Compose Email</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a href="#" ><input type='checkbox' name='historique' value='View Historique' onclick='submit()' >
                    <i class="fa fa-inbox"></i> View Historique  <span class="label pull-right">7</span>
                </a>
            </li>
            <li>
                <a href="#" onclick=''><input type='checkbox' name='historique' value='View Emails' onclick='submit()' ><i class="fa fa-envelope-o"></i> View Mails</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-certificate"></i> Important</a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
                </a>
            </li>
            <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
        </ul><!-- /.nav -->

            </div>
    <div class="col-sm-9">
        
        <!-- resumt -->
        <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <?php include('userinformation.php'); $img=image(); echo"<img src='$img' class='img-circle img-responsive'  >" ; ?>
                           </figure>
                           <div class="row">
                              <div class="col-xs-12 social-btns">
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-google">
                                    <i class="fa fa-google"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-twitter">
                                    <i class="fa fa-twitter"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-linkedin">
                                    <i class="fa fa-linkedin"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-github">
                                    <i class="fa fa-github"></i> </a>
                                 </div>
                                 <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                    <a href="#" class="btn btn-social btn-block btn-stackoverflow">
                                    <i class="fa fa-stack-overflow"></i> </a>
                                 </div>
                              </div>
                              
                              
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <ul class="list-group">
                              <li class="list-group-item"><?php include('userinformation.php'); echo "Name: ".name(); ?></li>
                              <li class="list-group-item"><?php include('userinformation.php'); echo "Type: ".type(); ?></li>
                              <li class="list-group-item"><?php include('userinformation.php'); echo "Country: ".country(); ?></li>

                              <li class="list-group-item"><i class="fa fa-envelope"></i><?php include('userinformation.php'); echo "Email_Adresse :".adresse_mail(); ?></li>
                              <li class="list-group-item"> <?php include('userinformation.php'); echo"Password ".password(); ?> </li>
                              <li class="list-group-item"><i class="fa fa-phone"></i> <?php include('userinformation.php'); echo"Phone number :".tel();?><li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <?php
if(isset($_POST['historique'])){$historique=$_POST['historique'];}
else{$historique='View Historique';}


$affiche='email_historique';
include('usermanipulation.php');
$sql1 = "SELECT * FROM users WHERE connected='True' ";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);
$name=$r['nom_user'];
$email=$r['email_adresse_user'];
$password_user=$r['password_user'];
$blocked=$r['$blocked'];
$save_pwd=$r['save_pwd'];
$country=$r['country'];
$img=$r['image_user'];
$num_tel=$r['num_tel_user'];

}
if(($historique=='View Historique') or ($historique=='')){
echo"<center> <h4> User Historique </h4>";
echo"<div style='width:100%; height:100%; '>";
view_profile_name($name);
echo"</div >";
echo"</center>";}


elseif($historique=='View Emails'){
echo"<center> <h4> User Eails Historique </h4>";
echo"<div style='width:100%; height:100%; '>";
view_email_historique_name($name);
echo"</div >";
echo"</center>";}

?>               
</div>


<div class="bs-callout bs-callout-danger">
                  <h4>Login historique</h4>
                  <ul class="list-group">
                     <a class="list-group-item inactive-link" href="#">
                        <div class="progress">
                           <div data-placement="top" style="width: 80%;" 
                              aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">80%</span>
                              <span class="progress-type">Jnuary  </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">February</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">March </span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">65%</span>
                              <span class="progress-type">April</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60%</span>
                              <span class="progress-type">May</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">50%</span>
                              <span class="progress-type">June</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">70%</span>
                              <span class="progress-type">July</span>
                           </div>
                        </div>
			<div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type">August</span>
                           </div>
                        </div><div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type">September</span>
                           </div>
                        </div><div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type">October</span>
                           </div>
                        </div><div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type"> November</span>
                           </div>
                        </div>
                        <div class="progress">
                           <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">10%</span>
                              <span class="progress-type"> December</span>
                           </div>
                        </div>
                        <div class="progress-meter">
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
                           <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
                           <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
                           <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
                        </div>
                     </a>
                  </ul>
               </div>
                   
               </div>
               
                           </div>
         </div>
        <!-- resume -->

    </div>
</div>
</div>
</form>
<script>
function submit(){document.getElementById("f1").submit();}

</script>
</body>

</html>