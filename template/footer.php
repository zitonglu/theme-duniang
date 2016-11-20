<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;">
<h2 style="font-size:60px;margin-bottom:32px;color:f00;">你的电脑已中毒，请立即关机！</h2>
由于您未授权的访问触发了防御机制，你的行为已经被列为侵略行为，已经向您的爱机发送超级病毒！
</div>';die();?>
<footer>
    <p class="text-center text-muted">Powered By {$zblogphpabbrhtml}.Theme by <a href="http://www.paipk.com" target="_blank" title="拍拍看科技">Paipk.com</a>. {$copyright}
    <span>{if $user.ID>0}.<a href="{$host}zb_system/admin/?act=admin" rel="nofollow" title="后台管理">管理</a>
    {else}.<a href="{$host}zb_system/cmd.php?act=login" rel="nofollow" title="登录管理">登录</a>{/if}</span>
    </p>
</footer>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="{$host}zb_users/theme/{$theme}/js/theia-sticky-sidebar.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery('.sidebar').theiaStickySidebar({ additionalMarginTop:60}); 
});
</script>
    {$footer}
    </body>
</html>