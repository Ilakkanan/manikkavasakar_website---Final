<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/splash.css') }}" rel="stylesheet">
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/splash.js') }}"></script>

@extends('layouts.layout')

@section('content')

<div class="splash">
    <h1 class="logo-header">
        <span class="logo"></span><br>
        <span class="logo">J/ Karaveddy Manikkavasagar Vidyalayam!</span>
    </h1>
</div>
<!-- Splash screen code start and end -->

<section class="welcome slide-up">
    <div class="welcome-cont">
        <div class="box-10"></div>
        <div class="box-10"></div>
        <div class="wel-content">
            <p class="describe describe-bold">Welcome to</p>
            <p class="title title-color">J/ Karaveddy Manikkavasagar Vidyalayam!</p>

            <div class="box-10"></div>
            <p class="describe">
                We are dedicated to nurturing young minds and shaping the future. 
                Located in the heart of the Jaffna District, our school offers a rich tradition of academic excellence and 
                holistic development. With a committed faculty, state-of-the-art facilities, and a focus on both academic 
                and extracurricular activities, we provide a nurturing environment where students can thrive.
            </p>
        </div>
    </div>

    <div class="box-50"></div>
    <div class="slider">
        <marquee direction="left">
            <?php
            // A simple for loop that prints numbers from 1 to 5
            for ($i = 1; $i <= 5; $i++) {
            ?>
                <img src="images/slider3.webp" alt="slider3">
                <img src="images/slider5.webp" alt="slider5">
                <img src="images/slider2.webp" alt="slider2">
                <img src="images/slider4.webp" alt="slider4">
                <img src="images/slider1.webp" alt="slider1">
                <img src="images/slider6.webp" alt="slider6">
            <?php
            }
            ?>
        </marquee>
    </div>
</section>

<!-- Announcement -->
<section class="announcement bg-color-brown slide-up">
    <p class="title">Latest News and Updates</p><br>
    <p><span id="current-time"></span></p>
    <div class="box-50"></div>
    <div class="announcement-cont">
        @if ($announcements->count() > 0)
            @foreach ($announcements as $announcement)
                <div class="announcement-item">
                    <h3>{{ Str::limit($announcement->title, 25) }} 
                    <span class="sub"><br><p class="sub">{{ $announcement->updated_at }}</p></span></h3>
                    <p>{{ Str::limit($announcement->description, 150) }}</p>
                </div>
            @endforeach
        @else
            <p>No announcements available at this time.</p>
        @endif
        <div class="btn"><a href="{{route('announcements.annoindex')}}">View more</a></div>
    </div>
</section>

<section class="about-us slide-up">
    <div class="about">
        <div class="motto"></div>
        <div class="about-row">
            <div class="vision">
                <div class="box-30"></div>
                <p class="about-title-1">School Hymn</p>
                <div class="box-30"></div>
                <p class="about-des-1">
                    வாழுக வாழுக வாழுக கல்வி<br>
                    சூழுக நன்மை துலங்கியே என்றும்<br><br>(வாழுக)<br><br>
                    மாணிக்க வாசகர் வித்தியாலயமே<br>
                    மாணவர் நாடும் நற்கலையகமே<br>
                    ஆணிப் பொன் கல்வி பயில் பேரிடமே<br>
                    ஐங்கரன் தச்சை அருள் சேரிடமே<br><br>
                    (வாழுக)<br><br>
                    எண்ணெழுத்திலக்கிய இலக்கணம் அறிவோம்<br>
                    இசைமலி நடனம் நாட்டியம் அறிவோம்<br>
                    பண்மைப் பாடல் ஆடல்கள் தெரிவோம்<br>
                    பரவிடும் சமயப் பெருமைகள் அறிவோம்<br><br>
                    (வாழுக)<br><br>
                    வளரும் விஞ்ஞான வழிகளும் அறிவோம்<br>
                    வேண்டிய கைப்பணி சித்திரம் அறிவோம்<br>
                    எழிலுறு தையல் மனையியல் பயில்வோம்<br>
                    இனி விளையாட்டுப் பயிற்சிகள் பெறுவோம்<br><br>
                    (வாழுக)<br><br>
                    வாழுக வாழுக வாழுக கல்வி<br>
                    சூழுக நன்மை துலங்கியே என்றும்<br>
                    வாழுக வாழுக வாழுக கல்வி<br>
                </p>
                <div class="box-30"></div>
            </div>

            <div class="Mission">
                <div class="box-30"></div>
                <div class="col">
                    <p class="about-title-1">Our Motto</p>
                    <div class="box-30"></div>
                    <p class="about-des-1">உயர்வு தரும் கல்வி</p>
                </div>
                <div class="box-30"></div>
                <div class="col">
                    <p class="about-title-1">Our Vision</p>
                    <div class="box-30"></div>
                    <p class="about-des-1">தேசிய கல்வி இலக்கிற்கு அமைய சிறுவர்களின் உள்ளார்ந்த ஆற்றல்களை செழுமையாக்கல்</p>
                </div>
                <div class="box-30"></div>
                <div class="col">
                    <p class="about-title-1">Our Mission</p>
                    <div class="box-30"></div>
                    <p class="about-des-1">எமது பாடசாலை பண்பாட்டு சூழ் அமைவின் பேண்தகு
                    அபிவிருத்திக்கு உரியதாக பௌதிக மனித வளங்களை ஆற்றுப்படுத்தல்.</p>
                </div>
                <div class="box-30"></div>
            </div>
            <div class="box-30"></div>
        </div>
    </div>

    <div class="box-50"></div>
</section>

@endsection

<script>
    function updateTime() {
        const now = new Date();
        const options = { 
            year: 'numeric', month: 'numeric', day: 'numeric', 
            hour: '2-digit', minute: '2-digit', second: '2-digit', 
            hour12: true 
        };
        document.getElementById('current-time').textContent = now.toLocaleString('en-US', options);
    }

    setInterval(updateTime, 1000); // Update every second
    window.onload = updateTime; // Update immediately on load
</script>
