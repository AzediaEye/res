<style>

  .comments-section {
    margin-top: 2rem;
  }

  .comments-heading {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 1rem;
  }

  .no-comments-message {
    color: #666;
  }

  .comment {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 8px;
  }

  .comment-user {
    font-weight: 600;
    color: #3366cc;
  }

  .comment-content {
    margin-top: 0.5rem;
    color: #555;
  }

  /* Comment Form */
  .comment-form {
    margin-top: 1.5rem;
  }

  .comment-form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 0.5rem;
  }

  .comment-form-textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    resize: vertical;
  }

  .comment-form-button {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 4px;
    background-color: #4caf50;
    color: #fff;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .comment-form-button:hover {
    background-color: #45a049;
  }
</style>
<section  id="menu" class="bg-no-repeat bg-[right_top_15rem] md:bg-right-top pt-8 md:pt-32 w-full" style="background-image: url(<?php echo e($foodBg); ?>)">
  <div class="flex flex-col justify-around items-center food-sm:items-start max-w-[980px] mx-auto">
    <div class="food-sm:text-left m-4 max-w-sm mt-5 p-4 text-center">
      <h3 class="font-bold font-cursive-merie text-4xl leading-normal capitalize">
        <span class="text-amber-400 leading-snug">we serve</span> <br /><span class="leading-normal">delicious food</span>
      </h3>
      <p class="pt-4 text-[14px] font-sans-lato text-slate-600 leading-relaxed">They're fill divide i their yielding our after have him fish on there for greater man moveth, moved Won't together isn't for fly divide mids fish firmament on net.
      </p>
    </div>
    <div class="w-full m-4 shadow-md group transition">

      <img class="w-full h-auto" src=../<?php echo e($foodItem->img); ?> alt=<?php echo e($foodItem->name."-image"); ?>>

      <div class="p-7 bg-slate-100 group-hover:bg-amber-400 transition duration-300 min-h-[170px]">
        <div class="flex flex-wrap justify-between font-bold font-cursive-merie text-lg">
          <h5 class='p-1 leading-normal capitalize'><?php echo e($foodItem->name); ?></h5>
          <span class="text-amber-400 group-hover:text-slate-600 p-1 text-right">£<?php echo e($foodItem->price); ?></span>
        </div>
        <p class="pt-4 text-[14px] font-sans-lato text-slate-600 leading-relaxed"><?php echo e($foodItem->desc); ?></p>
      </div>
      <div class="comments-section">
        <h3 class="comments-heading">Comments</h3>

        <?php if($commentsEmpty): ?>
        <p class="no-comments-message">No comments yet.</p>
        <?php else: ?>
        <div id="comments-container" class="space-y-4">
          <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="comment">
            <span class="comment-user"><?php echo e($comment->user->name); ?></span>
            <p class="comment-content"><?php echo e($comment->content); ?></p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>


      </div>

    </div>
  </div>
</section>
<?php if(auth()->guard()->check()): ?>
<form id="comment-form" action="<?php echo e(route('food.comment', ['id' => $foodItem->id])); ?>" method="post" class="comment-form">
  <?php echo csrf_field(); ?>
  <label for="comment" class="comment-form-label">Add a Comment:</label>
  <textarea name="content" id="comment" rows="3" class="comment-form-textarea"></textarea>
  <button type="button" onclick="postComment()" class="comment-form-button">Post Comment</button>
</form>
<?php else: ?>
<p class="mt-4 text-gray-600">Please <a href="<?php echo e(route('login')); ?>" class="text-blue-500">login</a> to post a comment.</p>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  function postComment() {
    var content = $('#comment').val();

    // Check if the comment is not empty
    if (content.trim() === '') {
      alert('Please enter a comment.');
      return;
    }

    // Assuming you have a route named 'food.comment.ajax' for handling the Ajax request
    $.ajax({
      url: "<?php echo e(route('food.comment', ['id' => $foodItem->id])); ?>",
      type: "POST",
      data: {
        content: content,
        _token: "<?php echo e(csrf_token()); ?>"
      },
      success: function(response) {

        alert("Comment by ajax has been created. page will be reloaded and comment will view");
        window.location.href = "";
        
      },
      error: function(xhr) {
        console.error(xhr.responseText);
        alert('Error posting comment. Please try again.');
      }
    });
  }
</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/res/resources/views/food/partials/food.blade.php ENDPATH**/ ?>