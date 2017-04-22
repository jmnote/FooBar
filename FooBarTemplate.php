<?php
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class FooBarTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' ); ?>


<!-- Your skin's code -->
<?php if ( $this->data['newtalk'] ) { ?>
  <div class="usermessage"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
    <?php $this->html( 'newtalk' );?>
  </div>
<?php } ?>


<?php if ( $this->data['sitenotice'] ) { ?>
  <div id="siteNotice"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
    <?php $this->html( 'sitenotice' ); ?>
  </div>
<?php } ?>

<a
	href="<?php 
		echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] );
		// This outputs your wiki's main page URL to the browser.
		?>"
	<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
>
	<img src="<?php 
		 	$this->text( 'logopath' ); 	
		 	// This outputs the path to your logo's image
		 	// You can also use $this->data['logopath'] to output the raw URL of the image. Remember to HTML-escape
		 	// if you're using this method, because the text() method does it automatically.
		?>"
		alt="<?php $this->text( 'sitename' ) ?>"
	>
</a>


<?php
if ( $this->data['title'] != '' ) { // Do not display the HTML tag if it the header is empty
	echo "<h1 id=\"firstHeading\" class=\"firstHeading\">";	// The CSS ID used by MonoBook and Vector.
	$this->html( 'title' );
	echo "</h1>";
}
?>


<?php 
if ( $this->data['isarticle'] ) {	// This is an optional test. Vector uses this if-statement to determine if the current page is an article (in the main namespace.)
	 echo '<div id="siteSub">';	// An optional div and CSS ID. This is what MonoBook and Vector use.
	 $this->msg( 'tagline' ); 
	 echo '</div>';
}
?>

<?php if ( $this->data['subtitle'] ) { ?>
	  <div id="contentSub"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
	  <?php $this->html( 'subtitle' ); ?>
	  </div>
<?php } ?>
	  <?php if ( $this->data['undelete'] ) { ?>
	  <div id="contentSub2"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
	  <?php $this->html( 'undelete' ); ?>
	  </div>
<?php } ?>


<?php $this->html( 'bodytext' ); ?>

<div id="catlinks" class="catlinks"> 
	<?php /* The catlinks function always uses this CSS ID and class;
	Your skin's CSS can specify formatting for this class and ID */ ?>

	<div id="mw-normal-catlinks" class="mw-normal-catlinks">
		<a href="/wiki/Special:Categories" title="Special:Categories">Category</a>: 
		<?php /* The word "category" in this <a> tag can be customized by updating Mediawiki:pagecategories
		You can also change link that this <a> tag points to by updating Mediawiki:pagecategorieslink */ ?>
		<ul>
			<li><a href="/wiki/Category:Help" title="Category:Help">Help</a></li>
		</ul>
	</div>
</div>

<?php echo $this->getIndicators(); ?>

<?php $this->html( 'dataAfterContent' ); ?>

<!-- /Your skin's code -->

<?php $this->printTrail(); ?>
</body>
</html><?php
	}
}