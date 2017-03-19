<!-- defaulr navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">세계최초 라라벨 한글 게시판</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">목록 <span class="sr-only">(current)</span></a></li> 
        <li><a href="{{ route('posts.create') }}">글쓰기 <span class="sr-only">(current)</span></a></li> 
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">만든이</a></li> 
      </ul>  

    {{ Form::open(['route' => 'search', 'method' => 'GET', 'class'=>'navbar-form navbar-left '])}} 
        {{ Form::text('search', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '256')) }} 
        {{ Form::submit('검색', array('class' => 'btn btn-primary openbutton')) }}
    {{ Form::close() }}
      
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
        <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left: 50px">
          <img src="/avatars/{{ Auth::user()->avatar }}" style="width:32px; height: 32px; position:absolute; top:10px; left:0px; border-radius: 50%" alt="">
          Hello {{ Auth::user()->name }}  
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.create') }}">글쓰기</a></li> 
            <li role="separator" class="divider"></li>
            <li><a href="/avatar">회원사진</a></li>
            <li><a href="{{ route('logout') }}">로그아웃</a></li>
          </ul>
        </li>
        @else
          <li class="{{ Request::is('login') ? "active" : "" }}">{!! Html::linkroute('login', '로그인') !!}</li>
          <li class="{{ Request::is('login') ? "active" : "" }}">{!! Html::linkroute('register', '회원가입') !!}</li>
        @endif
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 