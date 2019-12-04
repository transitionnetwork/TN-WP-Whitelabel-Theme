<?php $url = get_field('mailchimp_embed_form_action_code', 'option'); ?>

<div id="mc_embed_signup">
  <form action="<?php echo $url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
    <div id="mc_embed_signup_scroll">
      <h2>Subscribe to our newsletter</h2>
      <div class="mc-field-group">
        <div class="wrap">
          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email address">
          <input type="submit" value="Go" name="subscribe" id="mc-embedded-subscribe" class="button">
        </div>
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>  
      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;" aria-hidden="true">
        <input type="text" name="b_abee93598d8aedb981edc40ef_518fdb0b4e" tabindex="-1" value="">
      </div>
    </div>
  </form>
</div>

