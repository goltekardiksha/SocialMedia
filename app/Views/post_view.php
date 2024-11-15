<?php $this->extend('layouts/index'); ?>
<?php $this->section('content'); ?>

<div class="container custom_container rounded-lg" style="background-color:#BFECFF;">
    <div class="post-detail px-5 py-5">
        <h2 class="mb-3"><?= esc($post['title']); ?></h2>
        <h5>Description:</h5>
        <p class="mb-4"><?= esc($post['description']); ?></p>
        <?php foreach ($metaData as $key => $val): ?>
            <p class="mb-1"><strong><?= esc($key); ?>:</strong> <?= esc($val); ?></p>
                    <?php endforeach; ?>
        <p class="mt-4 mb-1">Posted by: <strong><?= esc($post['username']); ?></strong></p>
        <p class="mb-1">Posted on: <strong><?= esc($post['created_at']); ?></strong></p>
        <p class="mb-4">
        <?php if($post['likes_flag']!=0): ?>
            <i class="fas fa-thumbs-up" id="likeIcon"></i> 
        <?php else: ?>
            <i class="far fa-thumbs-up" id="likeIcon" onclick="func_like();"></i> 
        <?php endif ?>
            <strong>Likes:</strong> 
            <span id="likeCount"><?= esc($post['likes_count']); ?></span>
        </p>

        <h5 class="mb-2">Comments:</h3>
        <div class="comments mb-4">
            <?php if (!empty($post['comments'])): ?>
                <div class="list-group">
                    <?php foreach ($post['comments'] as $comment): ?>
                        <div class="list-group-item py-2 mb-2 rounded-lg">
                            <p class="mb-1"><strong><?= esc($comment['username']); ?>:</strong> <?= esc($comment['comment']); ?></p>
                            <p class="text-muted mb-1"><em>Posted on: <?= esc($comment['created_at']); ?></em></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>
        </div>

        <h4 class="mb-1">Add a Comment</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="comment">Your Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Submit Comment</button>
        </form>
    </div>
</div>

<script>
    function func_like(){
        var icon = document.getElementById('likeIcon');
      if (icon.classList.contains('far')) {
        icon.classList.remove('far'); 
        icon.classList.add('fas'); 
        var likeCount= document.getElementById('likeCount').innerText;  
        var likeval= parseInt(likeCount)+1;
        document.getElementById('likeCount').innerText =parseInt(likeCount)+1;
      } else {
        icon.classList.remove('fas'); 
        icon.classList.add('far'); 
        document.getElementById('likeCount').innerText -=1;
      }
    }
</script>
<?php $this->endSection(); ?>