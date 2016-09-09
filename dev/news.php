<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/carousel.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.2.0/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/club.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <script src="bootstrap-3.2.0/dist/js/bootstrap.js"></script>
    <title>News</title>
    <script type="text/javascript">
    function regExp(content){
      console.log(content);
      var strArray= content.split(" ");
      console.log(strArray);
      content = '';
      //example of what I am looking for href="/article/2685654/scripting-jvm-languages/google-go-164121-fast-guide-to-go-programming.html#jump">To
      for(var i = 0; i < strArray.length; i++){
        strArray[i] = strArray[i].replace('href=\"/article/','href=\"http://javaworld.com/article/');
        content += strArray[i];
      }
      return content;
    }
    google.load("feeds", "1");

    function onething() {
      var feed = new google.feeds.Feed("http://onethingwell.org/rss");
      feed.load(function(result) {
        if (!result.error) {
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            $('#oneThing').append(entry.content);
          }
        }
      });
    }
    //javaworld
    function sh() {
      var feed = new google.feeds.Feed("http://feeds.hanselman.com/ScottHanselman");
      feed.load(function(result) {
        if (!result.error) { 
          console.log(result.feed.entries);
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            //content = regExp(entry.content);
            $('#sh').append(entry.content);
          }
        }
      });
    }
    function ch() {
      var feed = new google.feeds.Feed("http://feeds.feedburner.com/codinghorror");
      feed.load(function(result) {
        if (!result.error) { 
          console.log(result.feed.entries);
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            //content = regExp(entry.content);
            $('#ch').append(entry.content);
          }
        }
      });
    }
    function alp() {
      var feed = new google.feeds.Feed("http://alistapart.com/site/rss");
      feed.load(function(result) {
        if (!result.error) { 
          console.log(result.feed.entries);
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            //content = regExp(entry.content);
            $('#alp').append(entry.content);
          }
        }
      });
    }
    function cb() {
      var feed = new google.feeds.Feed("http://feeds.feedburner.com/CodeBetter");
      feed.load(function(result) {
        if (!result.error) { 
          console.log(result.feed.entries);
          for (var i = 0; i < result.feed.entries.length; i++) {
            var entry = result.feed.entries[i];
            //content = regExp(entry.content);
            $('#cb').append(entry.content);
          }
        }
      });
    }
    //http://feeds.feedburner.com/CodeBetter
    //http://alistapart.com/site/rss
    //http://www.javaworld.com/index.rss
    google.setOnLoadCallback(onething);
    google.setOnLoadCallback(sh);
    google.setOnLoadCallback(ch);
    google.setOnLoadCallback(alp);
    google.setOnLoadCallback(cb);
    </script>
  </head>
  <body>
      <!-- php include for navbar -->
    <?php
    include("includes/navbar.php");
    ?>
    <!-- end php include -->

    <!-- Begin page content -->
    <div class="container">
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; border-bottom: 1px solid black;">
            <h3><a href="http://onethingwell.org/">One Thing Well - News Feed</a></h3>
        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="oneThing">

        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; border-bottom: 1px solid black;">
            <h3><a href="http://www.hanselman.com/blog/">Scott Hanselman's - News Feed</a></h3>
        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="sh">

        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; border-bottom: 1px solid black;">
            <h3><a href="http://blog.codinghorror.com/">Coding Horror - News Feed</a></h3>
        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ch">

        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; border-bottom: 1px solid black;">
            <h3><a href="http://alistapart.com">A List Apart - News Feed</a></h3>
        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="alp">

        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; border-bottom: 1px solid black;">
            <h3><a href="http://codebetter.com">Code Better - News Feed</a></h3>
        </div>
      </div>
      <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="cb">

        </div>
      </div>
    </div>


    <?php
    include("includes/footer.php");
    ?>