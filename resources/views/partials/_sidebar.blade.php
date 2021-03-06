<div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg')}}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ (\Request::route()->getName() == 'admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'slider.index') ? 'active' : '' }}">
                <a href="{{ route('slider.index') }}">
                    <i class="material-icons">ondemand_video</i>
                    <p>Slider</p>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'reservation.index') ? 'active' : '' }}">
                <a href="{{ route('reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservation</p>
                </a>
            </li>

            <li class="{{ (\Request::route()->getName() == 'categories.index') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'items.index') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Items</p>
                </a>
            </li>

            <li class="{{ (\Request::route()->getName() == 'contacts.index') ? 'active' : '' }}">
                <a href="{{ route('contacts.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Contacts</p>
                </a>
            </li>

            <li>
                <a href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="./maps.html">
                    <i class="material-icons">location_on</i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>