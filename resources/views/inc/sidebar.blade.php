<style>
    *{
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
    }
     .sidebar{
        margin-top: -24px;
         position: fixed;
         left:-250px;
         width: 250px;
         height:100%;
         background: rgb(240, 240, 240);
         transition:all .5s ease;
         border:1px solid;
     }

      
     .sidebar header{
         font-size:20px;
         color:black;
         text-align: center;
         line-height: 70px;
     }
     .sidebar ul a{
         display: block;
         height: 100%;
         width: 100%;
         line-height: 65px;
         font-size: 20px;
         color:black;
         padding-left:40px;
         box-sizing: border-box;
         border-top: 1px solid black; 
         /* border-bottom: 1px solid black; */
         transition:.4s;
     }
  
     ul li:hover a {
         padding-left:50px;
     }
     .sidebar ul a i {
         margin-right: 16px;
     }
     #check{
       display: none;
     }
     label #btn,label #cancel{
       position: absolute;
       cursor: pointer;
     }
     label #btn{
       left: 10px;
       top: 55px;
       font-size:30px;
       color: white;
       padding: 6px 12px;
       background: rgb(43, 43, 51);
       transition: all .5s ease;
       border-radius: 5px;
     }
     label #cancel{
       left: -195px;
       z-index: 1111;
       top: 60px;
       font-size: 20px;
       color:black;
       padding: 6px 12px;
       transition: all .5s ease;
     }
     #check:checked~.sidebar{
       left: 0;
     }
     #check:checked~ label #btn{
       left: 250px;
       opacity: 0;
       pointer-events: none;
       transition: all .5s ease;
     }
     #check:checked~ label #cancel{
       left: 200px;
      
     }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img class="logouser" src="img/CLIMBS.png" alt="Logo" height="40"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">File Directory <span class="sr-only"></span></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->last_name }},  {{ Auth::user()->first_name }}  {{ Auth::user()->middle_name }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    {{-- <a class="dropdown-item" href="{{ route('updateaccount') }}">
                      {{ __('Edit Profile') }}
                  </a> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
</nav>
{{-- <input type="checkbox" id="check">
<label for="check">
  <i class="fas fa-bars" id="btn"></i>
  <i class="fas fa-times" id="cancel"></i>
</label>
<div class="sidebar">
    <h5>
        <i class="fas fa-user"></i>{{ Auth::user()->last_name }},  {{ Auth::user()->first_name }}  {{ Auth::user()->middle_name }}
    </h5>
    <ul>
        <li><a href="/folder1"><i class="fas fa-folder-open"></i>Department 1</a></li>
        <li><a href="/folder2"><i class="fas fa-folder-open"></i>Department 2</a></li>
        <li><a href="#"><i class="fas fa-folder-open"></i>Department 3</a></li>
        <li><a href="#"><i class="fas fa-folder-open"></i>Department 4</a></li>
    </ul>
</div> --}}
