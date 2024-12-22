<link href="{{ asset('css/header/header.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<section class="header">
  <nav>
    <ul class="sidebar">
      <li onclick="hideSidebar()">
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26" fill="white">
            <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/>
          </svg>
        </a>
      </li>
      <li><a href="/">HOME</a></li>
      <li><a href="{{route('about')}}">ABOUT</a></li>
      <li><a href="{{route('common.display')}}">STAFF</a></li>
      <li><a href="{{route('announcements.annoindex')}}">ANNOUNCEMENT</a></li>
      <li><a href="{{route('contact')}}">CONTACT</a></li>
      <li><a href="{{ route('login') }}">LOGIN</a></li>
    </ul>
    <ul>
      <li>
        <div class="header-img">
          <a href="/">
            <img src="{{ asset('images/m-logo.webp') }}" alt="Logo" width="70px">
          </a>
          <p class="name">J/Karaveddy Manikkavasagar Vidyalayam</p>
        </div>
      </li>
      <li class="hideOnMobile"><a href="/">HOME</a></li>
      <li class="hideOnMobile"><a href="{{route('about')}}">ABOUT</a></li>
      <li class="hideOnMobile"><a href="{{route('common.display')}}">STAFF</a></li>
      <li class="hideOnMobile"><a href="{{route('announcements.annoindex')}}">ANNOUCEMENT</a></li>
      <li class="hideOnMobile"><a href="{{route('contact')}}">CONTACT</a></li>
      <li class="hideOnMobile"><a href="{{ route('login') }}">LOGIN</a></li>
      <li class="menu-button" onclick="showSidebar()" class="photo">
        <a href="#" >
          <svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26" fill="#6f0207">
            <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/>
          </svg>
        </a>
      </li>
    </ul>
  </nav>

  <script>
    function showSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const marquee = document.querySelector('.header-marquee');
      sidebar.style.display = 'flex';
      marquee.style.display = 'none';
    }

    function hideSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const marquee = document.querySelector('.header-marquee');
      sidebar.style.display = 'none';
      marquee.style.display = 'flex';
    }
  </script>
</section>
