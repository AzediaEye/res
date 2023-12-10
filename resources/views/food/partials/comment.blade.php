<div class="border p-3 mb-3">
  <p><strong>{{ $comment->user->name }} : </strong>{{ $comment->content }}</p>
  @if ($comment->replies->count() > 0)
  <div class="ml-6 mt-2">
    @foreach ($comment->replies as $reply)
    @include('food.partials.comment', ['comment' => $reply])
    @endforeach
  </div>
  @endif
</div>