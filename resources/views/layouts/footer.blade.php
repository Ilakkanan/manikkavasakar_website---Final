
<link href="{{ asset('css\footer\footer.css') }}" rel="stylesheet">
<footer>
    <div class="footerContainer">
        <div class="footer-row f-m">
            <div class="socialIcons">
            <img src="{{ asset('images/m-logo.webp') }}" alt="Logo" width="70px" class="box-10">
            </div>
            <div class="socialIcons">
            <p class="title f-m-t" >J/Karaveddy Manikkavasagar Vidyalayam</p>
            </div>
        </div>
        
        <div class="socialIcons f-m tempBox">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <!--<a href=""><i class="fa-brands fa-instagram"></i></a>-->
        </div>
        <div class="footerNav">
            <ul><li><a href="/">Home</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('common.display')}}">Staff</a></li>
                <li><a href="{{route('announcements.annoindex')}}">Announcement</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
            </ul>
        </div>
        <br><hr class="tempHr"><br>

        <div class="socialIcons f-m">
            <p class="title">Powered By :</p>
            
        </div>
        
        <div class="footer-row f-m">
            <div class="socialIcons">
            <img src="{{ asset('images/aq.png') }}" alt="Logo" width="70px">
            </div>
            <div class="socialIcons">
                <p class="title">Code Node (pvt) ltd</p>
                
            </div>
        </div>
        
        <div class="socialIcons f-m tempBox">
            <a href="https://www.codenode.lk/"><i class="fa-solid fa-globe"></i></a>
            <a href="https://wa.me/94760096103"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/profile.php?id=61560990155291&mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.linkedin.com/company/code-node-pvt-ltd"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/codenodepvt/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://x.com/CodeNodepvt"><i class="fa-brands fa-twitter"></i></a>
            
        </div>
    </div><br>
    <div class="footerBottom">
        <p>&copy; 2024 J/Karaveddy Manikkavasagar Vidyalayam. All Rights Reserved; Designed by <span class="designer"><a href="https://www.codenode.lk/" style="color:#6f0207;">Code Node (pvt) ltd</a></span></p>
    </div>
</footer>
<div class="fixed-buttons" id="fixed-buttons">
    <a href="{{route('contact')}}" class="announcement-button">
    <i class="fa-solid fa-address-book"></i> Contact Us
    </a>
</div>