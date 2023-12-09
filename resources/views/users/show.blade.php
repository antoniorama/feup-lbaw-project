@extends('layouts.app')

@section('main')
    <main id="profile-info">
        <section id="edit-profile-a">
            <h1>{{ $user->username }}</h1>
            <img class="notifications-icon" src="{{ asset('assets/notifications.png') }}" alt="Notifications-icon"/>
            <p class="notifications-number">{{ count($unread) }}</p>
            <article class="notifications-container">
                <ul class="notifications">
                    @foreach ($notifications as $notification)
                    <li class="notification">
                        <p class="notification-text">{{ $notification->content }}</p>
                        <p class="notification-date">{{ $notification->date }}</p>
                        @if (!$notification->read)
                            <img id="{{ $notification->id }}" class="view-icon" src="{{ asset('assets/view.png') }}" alt="View-icon"/>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </article>
            @if (Auth::user()?->id === $user->id || Auth::user()?->administrator)
                <a class="edit-profile" href="{{ route('edit-user', $user->id) }}">Edit</a>
                <form action="../users/{{ $user->id }}/delete" method="post">
                    @csrf
                    <button id="delete-account" type="submit"> Delete account </button>
                </form>
            @endif
        </section>
        <h2>{{ $user->email }}</h2>
        <img class="member-pfp main-user-pfp" src="{{ asset($user->image) }}" alt="User's profile photo" />
        <ul>
            <li id="about-button">About</li>
            <li id="questions-button">Questions</li>
            <li id="answers-button">Answers</li>
        </ul>
        <section class="about-user">
            <p class="user-register-date">
                Member since {{ $user->register_date->format('Y-m-d') }}
            </p>
            @if (count($user->badges) > 0)
                <ul class="user-badges">
                    @foreach ($user->badges as $badge)
                        <li class="user-received-badge">
                            <img src="{{ asset('assets/badge-images') . '/badge_' . $badge->id . '.png' }}" alt="badge image">
                        </li>
                    @endforeach
                </ul>
            @endif
                <ul class="user-stats">
                    <li class="user-stats-questions">
                        <svg width="40" height="40" viewBox="0 0 60 60" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.6776 5.27878C13.6534 5.5454 12.5815 6.0331 11.818 6.7811C11.0545 7.52913 10.5567 8.5793 10.2846 10.5625C10.0044 12.604 10 15.3097 10 19.1892V40.6105C10.9717 39.9452 12.0668 39.439 13.2475 39.1293C14.5679 38.7825 16.1076 38.783 18.3641 38.7838H50V19.1892C50 15.3097 49.9955 12.604 49.7155 10.5625C49.4432 8.5793 48.9455 7.52913 48.182 6.7811C47.4185 6.0331 46.3468 5.5454 44.3225 5.27878C42.2388 5.0043 39.477 5 35.5172 5H24.4828C20.523 5 17.7613 5.0043 15.6776 5.27878ZM16.8965 16.4865C16.8965 15.367 17.8228 14.4595 18.9655 14.4595H41.0345C42.1772 14.4595 43.1035 15.367 43.1035 16.4865C43.1035 17.606 42.1772 18.5135 41.0345 18.5135H18.9655C17.8228 18.5135 16.8965 17.606 16.8965 16.4865ZM18.9655 23.9189C17.8228 23.9189 16.8965 24.8264 16.8965 25.946C16.8965 27.0655 17.8228 27.973 18.9655 27.973H32.7585C33.9013 27.973 34.8275 27.0655 34.8275 25.946C34.8275 24.8264 33.9013 23.9189 32.7585 23.9189H18.9655Z"
                                    fill="#38B6FF" />
                            <path
                                    d="M18.6835 42.8378H21.7241H32.7584H49.9977C49.9889 45.6643 49.9439 47.772 49.7154 49.4375C49.4432 51.4208 48.9454 52.471 48.1819 53.219C47.4184 53.967 46.3467 54.4545 44.3224 54.7213C42.2387 54.9958 39.4769 55 35.5172 55H24.4827C20.5229 55 17.7612 54.9958 15.6775 54.7213C13.6533 54.4545 12.5814 53.967 11.8179 53.219C11.0544 52.471 10.5566 51.4208 10.2845 49.4375C10.1814 48.6865 10.1157 47.8455 10.0737 46.8895C10.7521 45.011 12.3341 43.566 14.3184 43.045C15.0414 42.8553 15.9848 42.8378 18.6835 42.8378Z"
                                    fill="#38B6FF" />
                        </svg>
                        <span class="user-stats-text user-stats-text-less-margin"> <span
                                    class="user-stats-count">{{ count($questions) }} </span>
                        <br>
                        Questions</span>
                    </li>
                    <li class="user-stats-answers">
                        <svg width="35" height="35" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M29.072 46.1795L27.7168 48.4692C26.5088 50.51 23.4912 50.51 22.2832 48.4692L20.928 46.1795C19.8768 44.4035 19.3512 43.5158 18.507 43.0245C17.6627 42.5335 16.5998 42.5153 14.4739 42.4788C11.3355 42.4245 9.36722 42.2323 7.71645 41.5485C4.6536 40.2798 2.22017 37.8465 0.9515 34.7835C-7.45058e-08 32.4865 0 29.5742 0 23.75V21.25C0 13.0664 -1.49012e-07 8.97462 1.842 5.96877C2.8727 4.28682 4.28682 2.8727 5.96877 1.842C8.97462 -1.49012e-07 13.0664 0 21.25 0H28.75C36.9335 0 41.0252 -1.49012e-07 44.0312 1.842C45.7132 2.8727 47.1273 4.28682 48.158 5.96877C50 8.97462 50 13.0664 50 21.25V23.75C50 29.5742 50 32.4865 49.0485 34.7835C47.7798 37.8465 45.3465 40.2798 42.2835 41.5485C40.6328 42.2323 38.6645 42.4245 35.526 42.4788C33.4 42.5153 32.3373 42.5335 31.493 43.0245C30.6488 43.5155 30.123 44.4035 29.072 46.1795ZM15 24.375C13.9645 24.375 13.125 25.2145 13.125 26.25C13.125 27.2855 13.9645 28.125 15 28.125H28.75C29.7855 28.125 30.625 27.2855 30.625 26.25C30.625 25.2145 29.7855 24.375 28.75 24.375H15ZM13.125 17.5C13.125 16.4645 13.9645 15.625 15 15.625H35C36.0355 15.625 36.875 16.4645 36.875 17.5C36.875 18.5355 36.0355 19.375 35 19.375H15C13.9645 19.375 13.125 18.5355 13.125 17.5Z"
                                    fill="#BD2020" />
                        </svg>
                        <span class="user-stats-text"> <span class="user-stats-count">{{ count($answers) }} </span> <br>
                        Answers</span>
                    </li>
                </ul>
                <article id="rating-communities">
                    @foreach ($reputations as $reputation)
                    <div class="card-rating">
                        <svg width="30" height="20" viewBox="0 0 52 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M34.0357 30.5715C36.1068 30.5715 37.7857 32.2505 37.7857 34.3215V38.6115L37.7688 38.8439C37.1029 43.4001 33.0104 45.5909 26.1431 45.5909C19.3006 45.5909 15.1428 43.4251 14.2453 38.9213L14.2143 38.6072V34.3215C14.2143 32.2505 15.8932 30.5715 17.9643 30.5715H34.0357ZM35.0941 17.7142L47.9643 17.7144C50.0353 17.7144 51.7143 19.3933 51.7143 21.4644V25.7543L51.6974 25.9868C51.0315 30.5429 46.939 32.7338 40.0717 32.7338L39.7112 32.7303C39.05 30.3669 36.9522 28.6035 34.4189 28.4409L34.0357 28.4287L32.0595 28.4302C34.2452 26.6624 35.6428 23.9588 35.6428 20.9287C35.6428 19.8016 35.4495 18.7196 35.0941 17.7142ZM4.03571 17.7144L16.9059 17.7142C16.5505 18.7196 16.3571 19.8016 16.3571 20.9287C16.3571 23.7805 17.5952 26.3432 19.5631 28.1087L19.9405 28.4302L17.9643 28.4287C15.2596 28.4287 12.9804 30.2509 12.2876 32.7346L12.2145 32.7338C5.37202 32.7338 1.21421 30.568 0.316697 26.0642L0.285706 25.7501V21.4644C0.285706 19.3933 1.96464 17.7144 4.03571 17.7144ZM26 13.4287C30.1421 13.4287 33.5 16.7865 33.5 20.9287C33.5 25.0708 30.1421 28.4287 26 28.4287C21.8579 28.4287 18.5 25.0708 18.5 20.9287C18.5 16.7865 21.8579 13.4287 26 13.4287ZM39.9286 0.571533C44.0707 0.571533 47.4286 3.9294 47.4286 8.07153C47.4286 12.2137 44.0707 15.5715 39.9286 15.5715C35.7864 15.5715 32.4286 12.2137 32.4286 8.07153C32.4286 3.9294 35.7864 0.571533 39.9286 0.571533ZM12.0714 0.571533C16.2136 0.571533 19.5714 3.9294 19.5714 8.07153C19.5714 12.2137 16.2136 15.5715 12.0714 15.5715C7.92928 15.5715 4.57142 12.2137 4.57142 8.07153C4.57142 3.9294 7.92928 0.571533 12.0714 0.571533Z" fill="black"/>
                        </svg>
                        <h3>{{ $reputation->community->name }}</h3>
                        <img class="rating-stars" src="{{ asset('assets/rating-images/star-rating.png') }}" alt="Rating stars">
                        <p>{{ $reputation->rating }} score</p>
                    </div>
                    @endforeach
                </article>
        </section>
        <section id="my-questions">
            @foreach ($questions as $question)
                @include('partials.question', ['question' => $question])
            @endforeach
        </section>
        <section id="my-answers">
            @foreach ($answers as $answer)
                @include('partials.answer', ['answer' => $answer])
            @endforeach
        </section>
    </main>
@endsection
