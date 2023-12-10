<div class="border p-3 mb-3">
  <p><strong><?php echo e($comment->user->name); ?> : </strong><?php echo e($comment->content); ?></p>
  <?php if($comment->replies->count() > 0): ?>
  <div class="ml-6 mt-2">
    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('food.partials.comment', ['comment' => $reply], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php endif; ?>
</div><?php /**PATH C:\wamp64\www\res\resources\views/food/partials/comment.blade.php ENDPATH**/ ?>