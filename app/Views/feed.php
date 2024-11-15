<?php $this->extend('layouts/index'); ?>
<?php $this->section('content'); ?>

<div class="container custom_container">
    <form id="filter-form" class="row mb-4">
            <div class="col-md-3">
                <label for="type" class="form-label">Type:</label>
                <select name="type" id="type" class="form-select custom-select">
                    <option value="">All</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['id']; ?>"><?= $type['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="sort_by" class="form-label">Sort By:</label>
                <select name="sort_by" id="sort_by" class="form-select custom-select">
                    <option value="DESC">Recent</option>
                    <option value="ASC">Oldest</option>
                    <option value="likes">Most Liked</option>
                    <option value="comments">Most Commented</option>
                </select>
            </div>
        </form>
    <?php if (!empty($posts)): ?>
        <div id="posts-container" class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($post['title']); ?></h5>
                            <p class="card-text"><?= esc(substr($post['description'],0, 100)); ?>...</p>
                            <p class="card-text">Posted On: <strong><?= esc($post['created_at']); ?></strong></p>
                            <p class="card-text">Posted by: <strong><?= esc($post['username']); ?></strong></p>
                            <p class="card-text"><strong>Likes: </strong> <?= esc($post['likes_count']); ?> | <strong>Comments:</strong> <?= esc($post['comments_count']); ?></p>
                            <a href="/post/<?= esc($post['id']); ?>" class="btn btn-primary">Read more...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div id="posts-container" class="row">
            <p class="alert alert-warning" style="width: 100%;">No posts available.</p>
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    
    $('#filter-form').on('input change', function() {
        var formData = $('#filter-form').serializeArray();
        var formDataObject = {};
        $.each(formData, function() {
            formDataObject[this.name] = this.value;
        });

        $.ajax({
            url: '<?= base_url('getfeed'); ?>',  
            type: 'POST',
            data: formDataObject,  
            dataType: 'json',
            success: function(response) {
                console.log(response.status);
                if (response.status === 'success') {
                    
                    $('#posts-container').empty();
                    $.each(response.posts, function(index, post) {
                        $('#posts-container').append(`
                        <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${post.title}</h5>
                            <p class="card-text">${post.description.substr(0, 100)}...</p>
                            <p class="card-text">Posted On: <strong>${post.created_at}</strong></p>
                            <p class="card-text">Posted by: <strong>${post.username}</strong></p>
                            <p class="card-text"><strong>Likes: </strong>${post.likes_count} | <strong>Comments: </strong>${post.comments_count}</p>
                            <a href="/post/${post.id}" class="btn btn-primary">Read more...</a>
                        </div>
                    </div>
                </div>`);
                    });
                } else {
                    $('#posts-container').empty();
                    $('#posts-container').append('<p class="alert alert-warning" style="width:100%">No posts found.</p>');
                }
            },
            error: function() {
                alert('An error occurred while fetching posts.');
            }
        });
    });
});
</script>
<?php $this->endSection(); ?>
