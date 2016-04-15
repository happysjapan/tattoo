<div class="social--holder">
	<ul class="social--list">
		<li class="google social--listitem">
			<!-- Placez cette balise où vous souhaitez faire apparaître le gadget Bouton +1. -->
			<div class="g-plusone" data-annotation="none"></div>

			<!-- Placez cette ballise après la dernière balise Bouton +1. -->
			<script type="text/javascript">
			  window.___gcfg = {lang: 'fr'};

			  (function() {
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/platform.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</li>
		<li class="twitter social--listitem">
			<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</li>
		<li class="facebook social--listitem">
			<div class="fb-like"
				data-href="<?php the_permalink(); ?>"
				data-layout="button"
				data-action="like"
				data-show-faces="true">
			</div>
		</li>
		<li class="bookmark social--listitem">
			<a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
			<!-- <a id="bookmarkme" href="<?php the_permalink(); ?>" rel="sidebar" title="bookmark this page">Bookmark</a> -->
			<script type="text/javascript">
			    jQuery(function() {
			        jQuery('#bookmarkme').click(function() {
			            if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
			                window.sidebar.addPanel(document.title,window.location.href,'');
			            } else if(window.external && ('AddFavorite' in window.external)) { // IE Favorite
			                window.external.AddFavorite(location.href,document.title);
			            } else if(window.opera && window.print) { // Opera Hotlist
			                this.title=document.title;
			                return true;
			            } else { // webkit - safari/chrome
			                alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
			            }
			        });
			    });
			</script>
		</li>
		<li class="line social--listitem">
			<span>
			<script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
			<script type="text/javascript">
			new media_line_me.LineButton({"pc":false,"lang":"ja","type":"a"});
			</script>
			</span>
			<a href="http://line.me/R/msg/text/?LINE%20it%21%0d%0ahttp%3a%2f%2fline%2enaver%2ejp%2f" class="lineButtonPc"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line20x20.png" width="20" height="20" alt="LINEで送る!" /></a>
		</li>
	</ul>
</div>
