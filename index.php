<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
</head>
<body>
  <header class="masthead text-white text-center" style="padding-top: 0rem;">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-md-offset-3">
          <h1 class="text-center">Text Search Analysis Tool</h1>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12 ">
            <div class="form-row">
              <div class="col-md-6">
                <form action="#" method="POST" class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="text" name="find_examption" value="<?php echo (isset($_POST['find_examption'])?$_POST['find_examption']:'');?>" id="find_examption" class="form-control form-control-lg" placeholder="Enter EXP Word...">
                    </div>
                    <div class="col-md-10">
                      <input type="text" name="find_word" value="<?php echo (isset($_POST['find_word'])?$_POST['find_word']:'');?>" id="find_word" class="form-control form-control-lg" placeholder="Enter Search Word...">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="btn_submit" class="btn btn-block btn-lg btn-primary">Check</button>
                    </div>
                    <div class="col-md-12" style="margin-top:2%;">
                      <textarea name="in_text" id="in_text" class="form-control form-control-lg" rows="18" cols="100"><?php echo (isset($_POST['in_text'])?$_POST['in_text']:'');?></textarea> 
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <div class="row">
                      <div class="col-md-12">
                        <button name="btn_submit" id="btn_submit" class="btn btn-block btn-lg btn-success">Search Result are ....</button>
                      </div>
                
                <div class="col-md-12" style="margin-top:2%;">
                
                    <?php
                      if(isset($_POST['btn_submit'])){$result = [];$resultcheck = [];
                        if(!empty($_POST['in_text']) && !empty($_POST['find_word']))
                        {
                          function multiexplode ($delimiters,$string) {
                              $ready = str_replace($delimiters, $delimiters[0], $string);
                              $launch = explode($delimiters[0], $ready);
                              return  $launch;
                          }

                          $break_condition = [' ']; ////////////////////////////////////////////////
                          $exception_data = isset($_POST['find_examption'])?explode('|',$_POST['find_examption']):''; ////////////////////////////////////////////////
                          $find_data = explode('|',$_POST['find_word']);
                          $data = multiexplode($break_condition,$_POST['in_text']);
                          $santance = '';
                          $flag = 0;
                         
                          foreach($data as $key=>$each_santence_word)
                          {
                            $each_santence_word = trim($each_santence_word);
                            array_push($resultcheck,$each_santence_word);
                            if(in_array($each_santence_word, $find_data))
                            {
                              $flag = 1;
                            }
                            if(!in_array($each_santence_word, $exception_data) && strpos($each_santence_word,"."))
                            {

                              if ($flag == 1){
                                //$santance .= substr($each_santence_word, 0, strpos($each_santence_word, '.')).' ';
                                $santance .= $each_santence_word;
                                array_push($result,ltrim($santance,'.'));
                                $santance = trim(strrchr($each_santence_word,'.')) != ''?trim(strrchr($each_santence_word,'.')):'';
                                $flag = 0;
                                }else {
                                  $santance = trim(strrchr($each_santence_word,'.')) != ''?trim(strrchr($each_santence_word,'.')).' ':'';
                              }
                              //$santance .= $each_santence_word;
                            }else{
                              $santance .= $each_santence_word.' ';
                            }
                           // if (in_array($each_santence_word, $exception_data)){
                             // array_push($result,$each_santence_word);
                           // }
                            
                          }

                          // if(count($result) > 0)
                          // {
                          //   foreach($result as $each_result){
                          //     echo $each_result.'&#013; &#010';
                              
                          //   }
                          // }
                         // print_r($result);
                        }
                      }
                    ?>
                <textarea  class="form-control form-control-lg" rows="18" cols="100"><?php
                foreach($result as $eachResult){
                  echo $eachResult.'&#013';
                }
                // if(!empty($result))
                // {
                // print_r($result);
                // print_r($resultcheck);
                // print_r($exception_data);
                // print_r($santance);
                // }
                ?></textarea>
                </div>
                </div>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </header>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
</body>

</html>
