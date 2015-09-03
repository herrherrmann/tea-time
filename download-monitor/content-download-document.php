<?php global $dlm_download; ?>
<div class="download-document">
  <a class="download-link"
     title="Download (<?php $dlm_download->the_filesize(); ?>)"
     href="<?php $dlm_download->the_download_link(); ?>"
     rel="nofollow">
    <?php $dlm_download->the_title(); ?>
  </a>
  <div class="download-description">
    <?php $dlm_download->the_short_description(); ?>
  </div>
</div>
