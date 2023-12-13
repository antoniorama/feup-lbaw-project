@extends('layouts.app')
@include ('layouts.errors')

@php
    $disableTextArea = (in_array($question->id_community, Auth::user()?->moderatorCommunities->pluck('id')->toArray()) && $question->user->id != Auth::user()?->id );
@endphp

@section('main')
    <main id="question-edit">
        <div class="main-content">
            <section class="main-info">
                <section class="add-tooltip" id="add-question-tooltip-section">
                    <span class="edit-question-text">Edit Question</span>
                    <div class="tooltip-icon" id="user-edit-profile">
                        <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 416.979 416.979" xml:space="preserve">
                            <path d="M356.004,61.156c-81.37-81.47-213.377-81.551-294.848-0.182c-81.47,81.371-81.552,213.379-0.181,294.85 c81.369,81.47,213.378,81.551,294.849,0.181C437.293,274.636,437.375,142.626,356.004,61.156z M237.6,340.786 c0,3.217-2.607,5.822-5.822,5.822h-46.576c-3.215,0-5.822-2.605-5.822-5.822V167.885c0-3.217,2.607-5.822,5.822-5.822h46.576 c3.215,0,5.822,2.604,5.822,5.822V340.786z M208.49,137.901c-18.618,0-33.766-15.146-33.766-33.765 c0-18.617,15.147-33.766,33.766-33.766c18.619,0,33.766,15.148,33.766,33.766C242.256,122.755,227.107,137.901,208.49,137.901z" />
                        </svg>
                        <p class="tooltip-text">
                            To edit a question, you can change its title, community, content and file, by clicking the respective fields and changing them.
                            You can also add or remove tags.
                            When you're done, click on the <b>Edit</b> button.
                            You can also delete the question by clicking on the <b>Delete</b> button.
                        </p>
                    </div>
                </section>
                <form class="question-container question-edit-container" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="horizontal-wrapper horizontal-wrapper-edit">
                        <img class="member-pfp question-member-pfp" src="{{ asset($question->user->image) }}" alt="User's profile picture" />
                        <div class="content-right">
                            <div class="question-details">
                                <a href="../users/{{ $question->id_user }}" class="question-username">{{ $question->user->username }}</a>
                                <span class="question-asked-date">Asked: {{ $question->date }}</span>
                                <span class="question-community">In: {{ $question->community->name }}</span>
                            </div>
                            <label for="title">Title</label>
                            <h2 class="question-title"><input id="title" class="question-title-edit" type="text" name="title" {{ $disableTextArea ? 'disabled' : '' }} value="{{ $question->title }}" placeholder="Enter the question's title here"></h2>
                            <label for="community">Community</label>
                            <select id="community" class="form-control" name="id_community" {{ $disableTextArea ? 'disabled' : '' }}>
                                <option value="{{ $question->id_community }}">{{ $question->community->name }}</option>
                                @foreach ($communities as $community)
                                    @if ($community->id !== $question->id_community)
                                        <option value="{{ $community->id }}">{{ $community->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label id="content-label" for="content">Content</label>
                            <textarea id="content" class="question-description non-movable-textarea" name="content" rows="6" cols="56" placeholder="Elaborate your question">{{ $question->content }}</textarea>
                            <label for="file">File</label>
                            <input id="file" type="file" name="file" accept="image/png,image/jpg,image/jpeg,application/doc,application/pdf,application/txt" value="{{ asset($question->file) }}">
                            <input type="hidden" name="type" value="question">
                            <div class="edit-question-tags">
                                @foreach ($question->tags as $tag) 
                                    <li id="{{ $tag->id }}-{{ $question->id }}" class="question-tag margin-on-tags">
                                        {{ $tag->name }}
                                        <div class="tag-tooltip-content color-black">Delete this tag.</div>
                                    </li>
                                @endforeach
                                <input id="add-tag" class="form-control" type="text" name="add-tag" placeholder="Add a tag">
                                @error('tag')
                                    <span class="error-message-tag-add">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="edit-buttons">
                        <button class="edit-button" formaction="../../questions/{{ $question->id }}">Edit</button>
                        <button class="delete-button" formaction="../../questions/{{ $question->id }}/delete">Delete</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
