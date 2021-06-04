<?php
//Get only the approved comments
$args = array(
  'status' => 'approve'
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
 
// Comment Loop
if ( $comments ) { ?>
  <h3 class="mt-5">Comments</h3>
  <?php foreach ( $comments as $comment ) { ?>
    <div class="p-3 my-3 bg-light">
      <em class="text-primary"><?php echo (date('l jS F Y, H:i:s', strtotime($comment->comment_date))); ?></em>
      <div class="mt-2">
        <p><?php echo $comment->comment_content; ?></p>
      </div>
    </div>
  <?php } ?>
<?php } ?>


<?php 
$comments_settings = array(                                                
    'title_reply' => 'Leave a comment',
    'comment_notes_after' => '',
);

comment_form($comments_settings);
