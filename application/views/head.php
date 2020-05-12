	
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <style>
          body{
              padding-top:60px;
          }
      </style>
      <link href="/static/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">             
    </head>
    <body>
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
        
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
        
            <!-- Be sure to leave the brand out there if you want it shown -->
            <a class="brand" href="#">JavaScript</a>
        
            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
              <!-- .nav, .navbar-search, .navbar-form, etc -->
            </div>
        
          </div>
        </div>
      </div>
      <?php 
        // var_dump($this->config->item('base_url')); 적용되나 테스트
      ?>
      <?php 
      // 개발 환경일때만 개발중 메세지 보여주기
      if($this->config->item('is_dev')){
      ?>
      <!-- well : 부트스트랩 api 박스안에 텍스트 적을수있음 -->
      <div class="well span12">
          개발환경을 수정 중입니다.
      </div>
      <!-- ㄴ 실제 서버와 개발서버를 왔다갔다 하면서 실제 서버를 건들여서(더미데이터 잘못입력 등) 낭패방지 위해 알려주기  -->
      <?php  
      }
      ?>
      
      <div class="container">
        <div class="row-fluid">