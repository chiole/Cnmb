<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a style="color:#999;" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
  	<a style="color:#999;" href="javascript:scroll(0,0)">TOP</a>
    <?php //_e('由 Typecho 强力驱动'); ?>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
