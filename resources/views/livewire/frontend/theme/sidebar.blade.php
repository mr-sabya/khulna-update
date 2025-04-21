<div class="sidebar" id="sidebar">
    <div class="sidebar-area">

        <div class="sp-menu">
            <ul class="nav">
                <li><a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}"> Publish Ad</a></li>
                <li><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">Become Volunteer</a></li>
            </ul>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}" wire:navigate><i class="fa-solid fa-home"></i> Home</a>
            </li>

            <li class="nav-item"><a href="{{ route('course.index') }}" class="{{ Route::is('course.index') ? 'active' : '' }}" wire:navigate>Rent a Car</a></li>

            <li class="nav-item"><a href="{{ route('volunteer.index') }}" class="{{ Route::is('volunteer.index') ? 'active' : '' }}" wire:navigate>To-Let</a></li>

            <li class="nav-item"><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}" wire:navigate>Super Shop</a></li>

            <li class="nav-item"><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}" wire:navigate>Blog</a></li>

            <li class="nav-item"><a href="{{ route('contact.index') }}" class="{{ Route::is('contact.index') ? 'active' : '' }}" wire:navigate>Contact</a></li>
            <li class="nav-item"><a href="#">Career</a></li>
        </ul>


    </div>
</div>