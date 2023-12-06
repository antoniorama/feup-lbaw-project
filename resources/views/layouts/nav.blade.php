@section('nav')
    <ul class="main-nav-list">
        <li class="img-menu {{ Request::routeIs('communities') ? 'active-nav-item' : '' }}">
            <a href="{{ route('communities') }}">
                <svg width="135" height="135" viewBox="0 0 135 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M128.324 40.4316C131.009 44.2548 127.808 48.9221 123.137 48.9221H6.74787C3.02116 48.9221 0 45.9009 0 42.1742V29.8256C0 13.3608 13.3608 0 29.8256 0H45.4807C56.4797 0 59.9211 3.57637 64.3072 9.44702L73.7542 21.9981C75.8461 24.7647 76.116 25.1021 80.0298 25.1021H98.8563C111.034 25.1021 121.81 31.1555 128.324 40.4316Z" />
                    <path d="M128.098 59.0439C131.815 59.0439 134.833 62.0514 134.845 65.7688L134.957 98.8584C134.957 118.765 118.763 134.959 98.8563 134.959H36.1011C16.1949 134.959 0 118.765 0 98.8584V65.7938C0 62.0669 3.02109 59.0459 6.74781 59.0459L128.098 59.0439Z" />
                </svg>
                Communities
            </a>
        </li>
        <li class="img-menu {{ Request::routeIs('questions') ? 'active-nav-item' : '' }}">
            <a href="{{ route('questions') }}">
                <svg width="135" height="130" viewBox="0 0 135 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M101.218 0H33.7394C13.4957 0 0 13.4957 0 33.7394V74.2267C0 94.4703 13.4957 107.966 33.7394 107.966V122.339C33.7394 127.737 39.745 130.976 44.1986 127.94L74.2266 107.966H101.218C121.462 107.966 134.957 94.4703 134.957 74.2267V33.7394C134.957 13.4957 121.462 0 101.218 0ZM67.4787 82.1217C64.6446 82.1217 62.4178 79.8274 62.4178 77.0608C62.4178 74.2941 64.6446 71.9999 67.4787 71.9999C70.3128 71.9999 72.5396 74.2941 72.5396 77.0608C72.5396 79.8274 70.3128 82.1217 67.4787 82.1217ZM75.981 54.118C73.3494 55.8725 72.5396 57.0196 72.5396 58.909V60.3261C72.5396 63.0927 70.2454 65.387 67.4787 65.387C64.7121 65.387 62.4178 63.0927 62.4178 60.3261V58.909C62.4178 51.0814 68.1535 47.2351 70.3128 45.7506C72.8095 44.0636 73.6193 42.9165 73.6193 41.162C73.6193 37.7881 70.8527 35.0215 67.4787 35.0215C64.1048 35.0215 61.3382 37.7881 61.3382 41.162C61.3382 43.9287 59.0439 46.2229 56.2773 46.2229C53.5106 46.2229 51.2164 43.9287 51.2164 41.162C51.2164 32.1874 58.5041 24.8997 67.4787 24.8997C76.4534 24.8997 83.7411 32.1874 83.7411 41.162C83.7411 48.8546 78.0729 52.701 75.981 54.118Z" />
                </svg>
                All Questions
            </a>
        </li>
        @auth
        <li class="img-menu {{ Request::routeIs('feed') ? 'active-nav-item' : '' }}">
            <a href="{{ route('feed') }}">
            <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.8882 17.5703C52.694 12.8896 52.0672 10.0197 50.0467 7.99924C47.118 5.07031 42.4037 5.07031 32.9757 5.07031H27.9757C18.5476 5.07031 13.8336 5.07031 10.9046 7.99924C7.97572 10.9282 7.97572 15.6422 7.97572 25.0703V35.0703C7.97572 44.4983 7.97572 49.2126 10.9046 52.1413C13.8336 55.0703 18.5476 55.0703 27.9757 55.0703H32.9757C42.4037 55.0703 47.118 55.0703 50.0467 52.1413C52.9757 49.2126 52.9757 44.4983 52.9757 35.0703V27.5703" stroke="#1C274C" stroke-width="3.75" stroke-linecap="round"/>
                <path d="M15.4757 30.0703C15.4757 26.5348 15.4757 24.767 16.5741 23.6687C17.6724 22.5703 19.4402 22.5703 22.9757 22.5703H37.9757C41.5112 22.5703 43.279 22.5703 44.3775 23.6687C45.4757 24.767 45.4757 26.5348 45.4757 30.0703V40.0703C45.4757 43.6058 45.4757 45.3736 44.3775 46.4721C43.279 47.5703 41.5112 47.5703 37.9757 47.5703H22.9757C19.4402 47.5703 17.6724 47.5703 16.5741 46.4721C15.4757 45.3736 15.4757 43.6058 15.4757 40.0703V30.0703Z" stroke="#1C274C" stroke-width="3.75"/>
                <path d="M17.9757 15.0703H30.4757" stroke="#1C274C" stroke-width="3.75" stroke-linecap="round"/>
            </svg>
                Personal Feed
            </a>
        </li>
        @endauth
        <li class="img-menu {{ Request::routeIs('about-contact-us') ? 'active-nav-item' : '' }}">
            <a href="{{ route('about-contact-us') }}">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                    <path d="M 25 1 C 11.214844 1 0 10.960938 0 23.199219 C 0 29.113281 2.574219 34.644531 7.261719 38.835938 C 6.394531 41.394531 4.171875 43.15625 2.519531 44.464844 C 1.003906 45.664063 -0.09375 46.53125 0.234375 47.757813 L 0.339844 48.160156 L 0.699219 48.367188 C 1.609375 48.886719 2.820313 49.152344 4.308594 49.152344 C 9.257813 49.152344 16.371094 46.3125 19.503906 44.945313 C 21.285156 45.316406 23.054688 45.5 24.898438 45.5 C 38.6875 45.5 49.898438 35.539063 49.898438 23.300781 C 49.898438 11.003906 38.730469 1 25 1 Z M 26.601563 34 C 26.601563 34.199219 26.5 34.398438 26.199219 34.398438 L 23.902344 34.398438 L 23.902344 34.300781 C 23.699219 34.300781 23.5 34.199219 23.5 33.902344 L 23.5 20.5 C 23.5 20.300781 23.601563 20.101563 23.902344 20.101563 L 26.199219 20.101563 C 26.402344 20.101563 26.601563 20.199219 26.601563 20.5 Z M 26.601563 15.800781 C 26.601563 16 26.5 16.199219 26.199219 16.199219 L 23.800781 16.199219 C 23.601563 16.199219 23.402344 16.101563 23.402344 15.800781 L 23.402344 13.199219 C 23.402344 13 23.5 12.800781 23.800781 12.800781 L 26.199219 12.800781 C 26.402344 12.800781 26.601563 12.898438 26.601563 13.199219 Z" />
                </svg>
                About & Contact Us
            </a>
        </li>
        <li class="img-menu {{ Request::routeIs('main-features') ? 'active-nav-item' : '' }}">
            <a href="{{ route('main-features') }}">
                <svg width="38" height="36" viewBox="0 0 38 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.8 7.0989H0V31.8681C0 33.8143 1.71 35.4066 3.8 35.4066H30.4V31.8681H3.8V7.0989ZM34.2 0.0219727H11.4C9.31 0.0219727 7.6 1.61428 7.6 3.56043V24.7912C7.6 26.7374 9.31 28.3297 11.4 28.3297H34.2C36.29 28.3297 38 26.7374 38 24.7912V3.56043C38 1.61428 36.29 0.0219727 34.2 0.0219727ZM32.3 15.9451H13.3V12.4066H32.3V15.9451ZM24.7 23.022H13.3V19.4835H24.7V23.022ZM32.3 8.86813H13.3V5.32967H32.3V8.86813Z" />
                </svg>
                Main Features
            </a>
        </li>
        @if (Auth::user()?->administrator)
            <li class="img-menu">
                <a href="{{ route('admin') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm1-13h-2v6h2v-6zm0 8h-2v2h2v-2z"/>
                    </svg>
                    Administration
                </a>
            </li>
        @endif
    </ul>
@endsection
