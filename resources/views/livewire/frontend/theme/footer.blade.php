<footer>
    <div class="footer">
        <div class="widget">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>

        <div class="widget">
            <ul>
                <li><a href="{{ route('contact.index')}}">Contact us</a></li>
                <li><a href="{{ route('about.index') }}">About Us</a></li>
                <li><a href="{{ route('privacy.index') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms.index') }}">Terms & Conditions</a></li>
                <li><a href="#">Career</a></li>
            </ul>
        </div>

        <p>{{ $setting->copyright_text }} || Developed By: <a class="text-white" target="_blank" href="https://sabyaroy.info/">Sabya Roy</a></p>

    </div>
</footer>