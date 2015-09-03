      </main><!-- content -->

      <footer id="footer">
        <nav id="menu-footer" aria-label="Footer Menu">
          <?php wp_nav_menu( array(
            'theme_location' => 'footer-menu',
            'container'      => false
          )); ?>
          <div class="clearfix"></div>
        </nav>
      </footer>

    </div><!-- container -->
    <?php wp_footer(); ?>
  </body>
</html>
