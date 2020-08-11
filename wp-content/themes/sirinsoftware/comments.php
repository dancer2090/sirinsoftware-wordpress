<?php
    $recaptcha_key = '6Lf7SWIUAAAAAK0p8Ud2SHJc2tHkyG9eWWMo3IGO';
?>
<div class="comments">
	<?php
		$args = array('status' => 'approve','number' => '999','post_id' => get_the_ID(),'parent'=> 0);
		$comments = get_comments($args);
	?>
	<?php if(!empty($comments)):?>
		<div class="items-wrap">
			<?php foreach($comments as $comment) :?>
				<div class="item" id="comment-<?php echo $comment->comment_ID;?>">
					<div class="center">
						<div class="comment-info">
							<span class="username"><?php echo $comment->comment_author;?></span>
							<span class="data"><?php comment_date('d M Y, H:i',$comment->comment_ID); ?></span>
							<span class="reply-action">reply</span>
						</div>
						<div class="text">
							<?php echo $comment->comment_content;?>
						</div>
					</div>
					<div class="reply">
<!--						<a href="javascript:;" class="btn btn-reply btn-09">-->
<!--							<i class="ico ico-reply-1"><i></i></i>-->
<!--							<span>Reply</span>-->
<!--						</a>-->
						<div class="form-reply">
							<form action="<?php echo get_site_url();?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">
								<div class="field">
									<div class="input-wrap">
										<span class="placeholder">Your Name:</span>
										<input type="text" id="author" name="author" aria-required="true">
									</div>
									<p class="error-text">Enter correct name</p>
								</div>
								<div class="field">
									<div class="input-wrap">
										<span class="placeholder">Email:</span>
										<input type="text" id="email" name="email" aria-required="true">
									</div>
									<p class="error-text">Enter correct email</p>
								</div>
								<div class="field">
									<div class="textarea-wrap">
										<span class="placeholder">Message:</span>
										<textarea id="comment" name="comment" aria-required="true"></textarea>
									</div>
									<p class="error-text">Enter correct message</p>
								</div>
								<div class="btn-wrap">
									<div class="field">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_key ?>"></div>
										<p class="error-text"><?php echo __('Check captcha field', 'sirinsoftware')?></p>
									</div>
									<button class="btn btn-01">
										<span>submit comment</span>
										<i class="ico ico-start"><i></i></i>
									</button>
								</div>
								<input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID();?>" id="comment_post_ID">
								<input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo $comment->comment_ID;?>">
							</form>
						</div>
					</div>
				</div>
				<?php 
				$childcomments = get_comments(array(
                    'post_id'	=> get_the_ID(),
                    'status' 	=> 'all',
                    'order'		=> 'DESC',
                    'parent'	=> $comment->comment_ID,
				));
				?>
				<?php if(!empty($childcomments)):?>
					<?php foreach ($childcomments as $childcomment):?>
						<div class="item sub-item" id="comment-<?php echo $childcomment->comment_ID;?>">
							<div class="initial">
								<span><?php echo substr($childcomment->comment_author,0,1);?></span>
							</div>
							<div class="center">
								<div class="info">
									<span class="username"><?php echo $childcomment->comment_author;?></span>
									<span class="data"><?php comment_date('j F Y',$childcomment->comment_ID); ?></span>
								</div>
								<div class="text">
									<?php echo $childcomment->comment_content;?>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
			<?php endforeach;?>
		</div>
	<?php endif;?>
</div>
<div class="leave-comment">
    <?php $i=1;?>
    <h3>Leave a comment</h3>
    <div class="form-wrap">
        <form action="<?php echo get_site_url();?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">
            <div class="comment-form-left">
                <div class="field">
                    <div class="input-wrap">
                        <span class="placeholder">Your Name:</span>
                        <input type="text" id="author" name="author" aria-required="true">
                    </div>
                    <p class="error-text">Enter correct name</p>
                </div>
            </div>
            <div class="comment-form-right">
                <div class="field">
                    <div class="input-wrap">
                        <span class="placeholder">Email:</span>
                        <input type="text" id="email" name="email" aria-required="true">
                    </div>
                    <p class="error-text">Enter correct email</p>
                </div>
            </div>
            <div class="comment-form-center">
                <div class="field">
                    <div class="textarea-wrap">
<!--                        <span class="placeholder">Message:</span>-->
                        <textarea placeholder="Message" id="comment" class="textarea-scrollbar scrollbar-outer" name="comment" aria-required="true"></textarea>
                    </div>
                    <p class="error-text">Enter correct message</p>
                </div>
            </div>
            <div class="comment-form-bottom">
                <div class="btn-wrap">
                    <div class="field">
                        <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_key ?>"></div>
                        <p class="error-text"><?php echo __('Check captcha field', 'sirinsoftware')?></p>
                    </div>
                    <button class="btn btn-01 btn-green icon">
                        submit comment
                        <i class="icon-fly"></i>
                    </button>
                </div>
            </div>



            <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID();?>" id="comment_post_ID">
            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </form>
    </div>
</div>