@if (Auth::user()?->id === $comment->id_user || Auth::user()?->administrator)
    <form class="comment" method="post">
        @csrf
        <label>Content
            <textarea class="description non-movable-textarea" name="content" placeholder="Type your comment in here">{{ $comment->content }}</textarea>
        </label>
        <a class="username" href="../users/{{ $comment->id_user }}">{{ $comment->user->username }}</a>
        <p class="date">{{ $comment->date }}</p>
        <button class="edit" formaction="../../answer-comments/{{ $comment->id }}">Edit</button>
        <button class="delete" formaction="../../answer-comments/{{ $comment->id }}/delete">Delete</button>
    </form>
@else
    <article class="comment">
        <h3>Comment</h3>
        <p class="description">{{ $comment->content }}</p>
        <a class="username" href="../users/{{ $comment->id_user }}">{{ $comment->user->username }}</a>
        <p class="date">{{ $comment->date }}</p>
    </article>
@endif
