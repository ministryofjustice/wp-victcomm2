<?php
class MoJSocialShareOptions {
	private $moj_social_share_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'moj_social_share_options_page' ) );
		add_action( 'admin_init', array( $this, 'moj_social_share_options_page_init' ) );
	}

	public function moj_social_share_options_page() {
		add_options_page(
			'MoJ Social Share Options', // page_title
			'MoJ Social Share Options', // menu_title
			'administrator', // capability
			'moj-social-share-options', // menu_slug
			array( $this, 'moj_social_share_options_create_admin_page' ) // function
		);
	}

	public function moj_social_share_options_create_admin_page() {
		$this->moj_social_share_options = get_option( 'moj_social_share_options_option_name' ); ?>

		<div class="wrap">
			<h2>MoJ Social Share Options</h2>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'moj_social_share_options_option_group' );
					do_settings_sections( 'moj-social-share-options-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function moj_social_share_options_page_init() {
		register_setting(
			'moj_social_share_options_option_group', // option_group
			'moj_social_share_options_option_name' // option_name
		);

		add_settings_section(
			'moj_social_share_options_setting_section', // id
			'Select one or more pages (or none) where the social share Facebook and Twitter icons appear.', // title
			array( $this, 'moj_social_share_options_section_info' ), // callback
			'moj-social-share-options-admin' // page
		);

		add_settings_field(
			'news_0', // id
			'News', // title
			array( $this, 'news_0_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'report_1', // id
			'Report', // title
			array( $this, 'report_1_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'review_2', // id
			'Review', // title
			array( $this, 'review_2_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'newsletter_3', // id
			'Newsletter', // title
			array( $this, 'newsletter_3_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'publication_4', // id
			'Publication', // title
			array( $this, 'publication_4_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'meeting_notes_5', // id
			'Meeting Notes', // title
			array( $this, 'meeting_notes_5_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);

		add_settings_field(
			'policy_6', // id
			'Policy', // title
			array( $this, 'policy_6_callback' ), // callback
			'moj-social-share-options-admin', // page
			'moj_social_share_options_setting_section' // section
		);
	}

	public function moj_social_share_options_section_info() {
		
	}

	public function news_0_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[news_0]" id="news_0" value="news_0" %s>',
			( isset( $this->moj_social_share_options['news_0'] ) && $this->moj_social_share_options['news_0'] === 'news_0' ) ? 'checked' : ''
		);
	}

	public function report_1_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[report_1]" id="report_1" value="report_1" %s>',
			( isset( $this->moj_social_share_options['report_1'] ) && $this->moj_social_share_options['report_1'] === 'report_1' ) ? 'checked' : ''
		);
	}

	public function review_2_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[review_2]" id="review_2" value="review_2" %s>',
			( isset( $this->moj_social_share_options['review_2'] ) && $this->moj_social_share_options['review_2'] === 'review_2' ) ? 'checked' : ''
		);
	}

	public function newsletter_3_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[newsletter_3]" id="newsletter_3" value="newsletter_3" %s>',
			( isset( $this->moj_social_share_options['newsletter_3'] ) && $this->moj_social_share_options['newsletter_3'] === 'newsletter_3' ) ? 'checked' : ''
		);
	}

	public function publication_4_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[publication_4]" id="publication_4" value="publication_4" %s>',
			( isset( $this->moj_social_share_options['publication_4'] ) && $this->moj_social_share_options['publication_4'] === 'publication_4' ) ? 'checked' : ''
		);
	}

	public function meeting_notes_5_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[meeting_notes_5]" id="meeting_notes_5" value="meeting_notes_5" %s>',
			( isset( $this->moj_social_share_options['meeting_notes_5'] ) && $this->moj_social_share_options['meeting_notes_5'] === 'meeting_notes_5' ) ? 'checked' : ''
		);
	}

	public function policy_6_callback() {
		printf(
			'<input type="checkbox" name="moj_social_share_options_option_name[policy_6]" id="policy_6" value="policy_6" %s>',
			( isset( $this->moj_social_share_options['policy_6'] ) && $this->moj_social_share_options['policy_6'] === 'policy_6' ) ? 'checked' : ''
		);
	}

}
/*if ( is_admin() )
	$moj_social_share_options = new MoJSocialShareOptions();
*/
/* 
 * Retrieve this value with:
 * $moj_social_share_options = get_option( 'moj_social_share_options_option_name' ); // Array of All Options
 * $news_0 = $moj_social_share_options['news_0']; // News
 * $report_1 = $moj_social_share_options['report_1']; // Report
 * $review_2 = $moj_social_share_options['review_2']; // Review
 * $newsletter_3 = $moj_social_share_options['newsletter_3']; // Newsletter
 * $publication_4 = $moj_social_share_options['publication_4']; // Publication
 * $meeting_notes_5 = $moj_social_share_options['meeting_notes_5']; // Meeting Notes
 * $policy_6 = $moj_social_share_options['policy_6']; // Policy
 */
?>
