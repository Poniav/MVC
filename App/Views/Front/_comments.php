<section class="panel panel-default" id="comment-<?php echo $comment->id(); ?>">
  <div class="panel-body">
    <p><strong><?php echo htmlspecialchars($comment->membre()); ?></strong></p>
    <?php if($comment->moderate() == 0) : ?>
      <p><?php echo $comment->content(); ?></p>
      <?php else : ?>
        <div class="alert alert-warning alert-dismissable">
              Le commentaire a été modéré. Vous ne pouvez pas le voir.
        </div>
    <?php endif; ?>
    <a class="btn btn-default" href="/alert/<?php echo $comment->id(); ?>" role="button">Signaler</a>
    <?php if($comment->niveau() <= 2) : ?>
        <a class="btn btn-primary reply" data-id="<?php echo $comment->id(); ?>" role="button">Répondre</a>
      <?php else: ?>
    <?php endif; ?>
  </div>
</section>
<div style="margin-left:50px;">
  <?php if(isset($comment->children)) : ?>
        <?php foreach ($comment->children as $comment): ?>
            <?php require '_comments.php'; ?>
        <?php endforeach; ?>
  <?php endif; ?>
</div>
