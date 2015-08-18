<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once("news_service.php");
  ?>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Daily Prophet</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <style>
  .caption h4 {
    white-space: normal;
  }
  .caption {
    height: auto;
  }
  </style>



  <!-- Custom CSS <link href="css/shop-homepage.css" rel="stylesheet">-->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li>
                  <a href="#">Home</a>
                </li>
                <li>
                  <a href="sources.html">Sources</a>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">
          <h1>The Daily Prophet</h1>

          <div class="row">

            <div class="col-md-3">

              <div class="list-group">
                <a href="#carousel" class="list-group-item">Top Stories</a>
                <a href="#politics" class="list-group-item">Politics</a>
                <a href="#health" class="list-group-item">Health</a>
                <a href="#sports" class="list-group-item">Sports</a>
                <a href="#business" class="list-group-item">Business</a>
                <a href="#entertainment" class="list-group-item">Entertainment</a>
              </div>
            </div>

            <div class="col-md-9">

              <div class="row carousel-holder">

                <div class="col-md-12">
                  <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <?php $topnews = getTopNews(); 
                    //$index = rand(0, count($topnews)) % count($topnews) 
                    ?>
                    <div class="carousel-inner">
                      <div class="item active">
                        <img class="slide-image" src="<?= $topnews[0]['image_url']?>" alt="No Image Available">
                        <div class="carousel-caption">
                          <h3><a href="<?= $topnews[0]['url'] ?>"><?= substr($topnews[0]['heading'], 0, 40)?></a></h3>
                        </div>
                      </div>
                      <div class="item">
                        <img class="slide-image" src="<?= $topnews[1]['image_url']?>" alt="No Image Available">
                        <div class="carousel-caption">
                          <h3><a href="<?= $topnews[1]['url'] ?>"><?= substr($topnews[1]['heading'], 0, 40)?></a></h3>
                        </div>
                      </div>
                      <div class="item">
                        <img class="slide-image" src="<?= $topnews[2]['image_url']?>" alt="No Image Available">
                        <div class="carousel-caption">
                          <h3><a href="<?= $topnews[2]['url'] ?>"><?= substr($topnews[2]['heading'], 0, 40)?></a></h3>
                        </div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="col-md-3">
            <!-- <img class="img-responsive img-thumbnail img-rounded" src="images/ad1.jpg" alt="No Image Available">  -->
            <img class="img-responsive img-thumbnail img-rounded" src="images/ad2.jpg" alt="No Image Available">
          </div>


          <div class="col-md-9">


            <div class="bs-callout bs-callout-warning">

              <div class="row" id="business">
                <h6> <a href="#">Business </a></h6>


                <?php 
                $news = getBusinessNews();
                $index = rand(0, count($news)) % count($news);
                ?>


                <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail">
                    <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
                    <div class="caption">
                     <!-- <h4 class="pull-right">$24.99</h4> -->
                     <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
                     </h4>
                     <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
                     <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>
                   </div>

                 </div>
               </div>


               <?php

               $index = ($index+ 1) % count($news);

               ?>

               <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                  <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
                  <div class="caption">
                   <!-- <h4 class="pull-right">$24.99</h4> -->
                   <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
                     <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
                     <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>

                   </div>
                 </div>
               </div>

               <?php

               $index = ($index+ 1) % count($news);

               ?>

               <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                  <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
                  <div class="caption">
                   <!-- <h4 class="pull-right">$24.99</h4> -->
                   <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
                     <p><?= substr($news[$index]['summary'], 0, 100)."...";?></p>
                     <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."...";?></a>
                   </div>


                 </div>
               </div>
             </div>

             <button class="pull-left" id="business-left"><span class="glyphicon glyphicon-chevron-left"></span></button>
             <button class="pull-right" id="business-right"><span class="glyphicon glyphicon-chevron-right"></span></button>
           </div>


           <div class="bs-callout bs-callout-danger">
            <div class="row" id="sports">
              <h6> <a href="#">Sports </a></h6>

              <?php 
              $news = getSportsNews();
              $index = rand(0, count($news)) % count($news);
              ?>


              <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                  <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
                  <div class="caption">
                   <!-- <h4 class="pull-right">$24.99</h4> -->
                   <h4><a href="<?= $news[$index]['url'] ?>"><?= $news[$index]['title']?></a>
                   </h4>
                   <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
                   <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>
                 </div>

               </div>
             </div>


             <?php

             $index = ($index+ 1) % count($news);

             ?>

             <div class="col-sm-4 col-lg-4 col-md-4">
              <div class="thumbnail">
                <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
                <div class="caption">
                 <!-- <h4 class="pull-right">$24.99</h4> -->
                 <h4><a href="<?= $news[$index]['url'] ?>"><?= $news[$index]['title']?></a>
                 </h4>
                 <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
                 <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>

               </div>
             </div>
           </div>

           <?php

           $index = ($index+ 1) % count($news);

           ?>

           <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
              <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
              <div class="caption">
               <!-- <h4 class="pull-right">$24.99</h4> -->
               <h4><a href="<?= $news[$index]['url']?>"><?= $news[$index]['title']?></a>
               </h4>
               <p><?= substr($news[$index]['summary'], 0, 100)."...";?></p>
               <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."...";?></a>
             </div>

           </div>
         </div>

       </div>
       <button class="pull-left" id="sports-left"><span class="glyphicon glyphicon-chevron-left"></span></button>
       <button class="pull-right" id="sports-right"><span class="glyphicon glyphicon-chevron-right"></span></button>
     </div>







     <div class="bs-callout bs-callout-info">
      <h6> <a href="#"> Politics </a> </h6>

      <div class="row" id="politics" height="100px">

        <?php 
        $news = getPoliticalNews();
        $index = rand(0, count($news)) % count($news);
        ?>


        <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
            <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
            <div class="caption">
             <!-- <h4 class="pull-right">$24.99</h4> -->
             <h4><a href="<?= $news[$index]['url'] ?>"><?= $news[$index]['title']?></a>
             </h4>
             <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
             <a target="_blank" href="<?= $news[$index]['url'] ?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>
           </div>

         </div>
       </div>


       <?php

       $index = ($index+ 1) % count($news);

       ?>

       <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
          <div class="caption">
           <!-- <h4 class="pull-right">$24.99</h4> -->
           <h4><a href="<?= $news[$index]['url'] ?>"><?= $news[$index]['title']?></a>
           </h4>
           <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
           <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>

         </div>
       </div>
     </div>

     <?php

     $index = ($index+ 1) % count($news);

     ?>

     <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
        <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
        <div class="caption">
         <!-- <h4 class="pull-right">$24.99</h4> -->
         <h4><a href="<?= $news[$index]['url'] ?>"><?= $news[$index]['title']?></a>
         </h4>
         <p><?= substr($news[$index]['summary'], 0, 100)."...";?></p>
         <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."...";?></a>
       </div>

     </div>
   </div>

 </div>

 <button class="pull-left" id="politics-left"><span class="glyphicon glyphicon-chevron-left"></span></button>
 <button class="pull-right" id="politics-right"><span class="glyphicon glyphicon-chevron-right"></span></button>
</div>





<div class="bs-callout bs-callout-warning">

  <div class="row" id="health">
    <h6> <a href="#">Health </a></h6>

    <?php 
    $news = getHealthNews();
    $index = rand(0, count($news)) % count($news);
    ?>


    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
        <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
        <div class="caption">
         <!-- <h4 class="pull-right">$24.99</h4> -->
         <h4><a href="<?= $news[$index]['url'] ?>" ><?= $news[$index]['title']?></a>
         </h4>
         <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
         <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>
       </div>

     </div>
   </div>


   <?php

   $index = ($index+ 1) % count($news);

   ?>

   <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
      <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
      <div class="caption">
       <!-- <h4 class="pull-right">$24.99</h4> -->
       <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
       </h4>
       <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
       <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>

     </div>
   </div>
 </div>

 <?php


 $index = ($index+ 1) % count($news);

 ?>

 <div class="col-sm-4 col-lg-4 col-md-4">
  <div class="thumbnail">
    <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
    <div class="caption">
     <!-- <h4 class="pull-right">$24.99</h4> -->
     <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
     </h4>
     <p><?= substr($news[$index]['summary'], 0, 100)."...";?></p>
     <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."...";?></a>
   </div>




 </div>

</div>

</div>

<button class="pull-left" id="health-left"><span class="glyphicon glyphicon-chevron-left"></span></button>
<button class="pull-right" id="health-right"><span class="glyphicon glyphicon-chevron-right"></span></button>
</div>


<div class="bs-callout bs-callout-danger">

  <div class="row" id="entertainment">
    <h6> <a href="#">Entertainment </a></h6>

    <?php 
    $news = getEntertainmentNews();
    $index = rand(0, count($news)) % count($news);
    ?>


    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
        <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
        <div class="caption">
         <!-- <h4 class="pull-right">$24.99</h4> -->
         <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
         </h4>
         <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
         <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>
       </div>

     </div>
   </div>


   <?php

   $index = ($index+ 1) % count($news);

   ?>

   <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
      <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
      <div class="caption">
       <!-- <h4 class="pull-right">$24.99</h4> -->
       <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
       </h4>
       <p><?= substr($news[$index]['summary'], 0, 100)."..."?></p>
       <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."..."?></a>

     </div>
   </div>
 </div>

 <?php

 $index = ($index+ 1) % count($news);

 ?>

 <div class="col-sm-4 col-lg-4 col-md-4">
  <div class="thumbnail">
    <img src="<?= $news[$index]['image_url'] ?>" alt="No Image Available">
    <div class="caption">
     <!-- <h4 class="pull-right">$24.99</h4> -->
     <h4><a href="<?=$news[$index]['url']?>"><?= $news[$index]['title']?></a>
     </h4>
     <p><?= substr($news[$index]['summary'], 0, 100)."...";?></p>
     <a target="_blank" href="<?= $news[$index]['url']?>"><?= substr($news[$index]['url'], 0, 40)."...";?></a>
   </div>


 </div>
 
</div>
</div>

<button class="pull-left" id="entertainment-left"><span class="glyphicon glyphicon-chevron-left"></span></button>
<button class="pull-right" id="entertainment-right"><span class="glyphicon glyphicon-chevron-right"></span></button>
</div>

</div>


</div>

</div>


<!-- /.container -->

<div class="container">

  <hr>

  <!-- Footer -->
  <footer>
    <div class="row">
      <div class="col-lg-12">
        <p>Copyright &copy; The Daily Prophet</p>
      </div>
    </div>
  </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
