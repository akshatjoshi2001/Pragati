<?php
session_start();
include 'db.php';
include 'teacher/info.php';
$admn = $_SESSION["student"];
$cid = $_REQUEST["cid"];

$result = mysqli_query($con,"select * from chats where id='$cid' and admn='$admn' ");
$pass = "false";
while($row = mysqli_fetch_array($result))
{
	
	$pass = "true";
	$tid = $row["tid"];
	
}
if($pass != "false")
{
	
	
	?> 
	<style>
	@import url(http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);


.ui {
  margin: 10px auto;
  width: 745px;
  
  background-color: #fff;
  border-radius: 3px;
  box-shadow: 0 0 25px #3a9fc4;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  overflow: hidden;
}
.ui .search input {
  outline: none;
  border: none;
  background: none;
}
.ui .search {
  position: relative;
}
.ui .search input[type=submit] {
  font-family: 'FontAwesome';
  position: absolute;
  right: 25px;
  top: 27px;
  color: white;
}
.ui .search input[type=search] {
  background-color: #696c75;
  border-radius: 3px;
  padding: 10px;
  width: 90%;
  box-sizing: border-box;
  margin: 15px 10px;
  color: #fff;
}
.ui .left-menu {
  width: 29%;
  box-sizing: content-box;
  padding-right: 1%;
  height: 100%;
  background: #434753;
}
.ui .chat {
  width: 70%;
  height: 100%;
  background: #f1f5f8;
}
.ui .chat .info {
  display: -webkit-inline-box;
  display: -webkit-inline-flex;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  vertical-align: 40px;
  width: calc(100% - 65px - 50px);
}
.ui .chat .info .name {
  font-weight: 600;
  color: #434753;
  height: 50%;
}
.ui .chat .info .count {
  color: #6d738d;
}
.ui .chat s.fa {
  color: #d6d9de;
  vertical-align: 25px;
}
.ui .avatar > img,
.ui .list-friends img {
  border-radius: 50%;
  border: 3px solid #696c75;
}
.ui .list-friends {
  list-style: none;
  font-size: 13px;
  height: 88%;
}
.ui .list-friends img {
  margin: 5px;
}
.ui .list-friends > li {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin: 0 0 10px 10px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.ui .list-friends .info {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
}
.ui .list-friends .user {
  color: #fff;
  margin-top: 12px;
}
.ui .list-friends .status {
  position: relative;
  margin-left: 14px;
  color: #a8adb3;
}
.ui .list-friends .off:after,
.ui .list-friends .on:after {
  content: '';
  left: -12px;
  top: 8px;
  position: absolute;
  height: 7px;
  width: 7px;
  border-radius: 50%;
}
.ui .list-friends .off:after {
  background: #fd8064;
}
.ui .list-friends .on:after {
  background: #62bf6e;
}
.ui .top {
  height: 70px;
}
.ui .messages {
  height: calc(100% - 70px - 150px);
  list-style: none;
  border: 2px solid #fff;
  border-left: none;
  border-right: none;
  width:100vw;
}
.ui .messages li {
  margin: 10px;
  -webkit-transition: all .5s;
  transition: all .5s;
}
.ui .messages li:after {
  content: '';
  clear: both;
  display: block;
}
.ui .messages li .head {
  font-size: 13px;
}
.ui .messages li .name {
  font-weight: 600;
  position: relative;
}
.ui .messages li .name:after {
  content: '';
  position: absolute;
  height: 8px;
  width: 8px;
  border-radius: 50%;
  top: 6px;
}
.ui .messages li .time {
  color: #b7bccf;
}
.ui .messages li .message {
  margin-top: 20px;
  color: #fff;
  font-size: 15px;
  border-radius: 3px;
  padding: 20px;
  line-height: 25px;
  max-width: 500px;
  word-wrap: break-word;
  position: relative;
}
.ui .messages li .message:before {
  content: '';
  position: absolute;
  width: 0px;
  height: 0px;
  top: -12px;
  border-bottom: 12px solid #62bf6e;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
}
.ui .messages li.t .name {
  margin-left: 20px;
}
.ui .messages li.t .name:after {
  background-color: #62bf6e;
  left: -20px;
  top: 6px;
}
.ui .messages li.t .message {
  background-color: #62bf6e;
  float: left;
}
.ui .messages li.t .message:before {
  left: 16px;
  border-bottom-color: #62bf6e;
}
.ui .messages li.s .head {
  text-align: right;
}
.ui .messages li.s .name {
  margin-right: 20px;
}
.ui .messages li.s .name:after {
  background-color: #7bc4ef;
  right: -20px;
  top: 6px;
}
.ui .messages li.s .message {
  background-color: #7bc4ef;
  float: right;
}
.ui .messages li.s .message:before {
  right: 16px;
  border-bottom-color: #7bc4ef;
}
.ui .write-form {
  height: 150px;
}
.ui .write-form textarea {
  height: 75px;
  margin: 17px 5%;
  width: 90%;
  outline: none;
  padding: 15px;
  border: none;
  border-radius: 3px;
  resize: none;
}
.ui .write-form textarea:before {
  content: '';
  clear: both;
}
.ui .avatar > img {
  border-color: #62bf6e;
  margin: 10px;
  margin-right: 5px;
}
.ui .avatar {
  display: inline-block;
}
.ui .send {
  color: #7ac5ef;
  text-transform: uppercase;
  font-weight: 700;
  float: right;
  margin-right: 5%;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.ui i.fa-file-o {
  margin-left: 15px;
}
.ui i.fa-picture-o {
  margin-left: 5%;
}
	</style>
		<div class="ui">
		
	
			<ul class="messages">
				
				
				<?php
				include 'markread.php';
				$res = mysqli_query($con,"select * from messages where chatid='$cid'"); 
				while($row = mysqli_fetch_array($res))
				{
				markread($id);
					?><li class="<?php  echo $row['st']; 
					
					
					
					?>"><div class="head">
						<?php 
						if ($row['st'] == "s")
						{?>
						<span class="name">You</span>
						<?php } else { ?>
						<span class="name">Teacher</span>
						<?php } ?>
					</div>
					<div class="message"><?php echo $row['body']; ?></div>
				</li>
				<?php } ?>
			</ul>
			
		</div>
	</div>
	
	<script>(function() {
  var NYLM, claerResizeScroll, conf, getRandomInt, insertI, lol;

  conf = {
    cursorcolor: "#696c75",
    cursorwidth: "4px",
    cursorborder: "none"
  };

  lol = {
    cursorcolor: "#cdd2d6",
    cursorwidth: "4px",
    cursorborder: "none"
  };


  getRandomInt = function(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  };

  claerResizeScroll = function() {
    $("#texxt").val("");
    $(".messages").getNiceScroll(0).resize();
    return $(".messages").getNiceScroll(0).doScrollTop(999999, 999);
  };

  insertI = function() {
    var innerText, otvet;
    innerText = $.trim($("#texxt").val());
    if (innerText !== "") {
      $(".messages").append("<li class=\"i\"><div class=\"head\"><span class=\"time\">" + (new Date().getHours()) + ":" + (new Date().getMinutes()) + " AM, Today</span><span class=\"name\"> Буль</span></div><div class=\"message\">" + innerText + "</div></li>");
      claerResizeScroll();
      return otvet = setInterval(function() {
        $(".messages").append("<li class=\"friend-with-a-SVAGina\"><div class=\"head\"><span class=\"name\">Юния  </span><span class=\"time\">" + (new Date().getHours()) + ":" + (new Date().getMinutes()) + " AM, Today</span></div><div class=\"message\">" + NYLM[getRandomInt(0, NYLM.length - 1)] + "</div></li>");
        claerResizeScroll();
        return clearInterval(otvet);
      }, getRandomInt(2500, 500));
    }
  };

  $(document).ready(function() {
    $(".list-friends").niceScroll(conf);
    $(".messages").niceScroll(lol);
    $("#texxt").keypress(function(e) {
      if (e.keyCode === 13) {
        insertI();
        return false;
      }
    });
    return $(".send").click(function() {
      return insertI();
    });
  });

}).call(this);

</script>
	
	<?php
	
	
	
	
	
	
	
	
}


?>