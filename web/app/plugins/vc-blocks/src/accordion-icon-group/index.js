/**
 * BLOCK: Accordion & Icon Group
 */

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Register block
const { 
	registerBlockType,
} = wp.blocks;

// Register editor components
const {
	InnerBlocks,
} = wp.editor;

// Register the block
registerBlockType( 'vc/accordion-icon-group', {
	title: __( 'Accordion & Icon Group' ),
	description: __( 'An accordion, with each section having an icon, a title and text.' ),
	icon: 'editor-ul',
	category: 'common',
	keywords: [
		__( 'accordion' ),
		__( 'group' ),
		__( 'timeline' ),
	],
	attributes: [],

	// Render the block components
	// edit: AccordionIconGroupBlock,
	edit: function({ className }) {
		return (
			<div className={ className }>
				<InnerBlocks
					allowedBlocks={ ['vc/accordion-icon'] }
					template={ [['vc/accordion-icon']] }
				/>
			</div>
		);
	},

	// Save the attributes and markup
	save: function( props ) {
		// Save the block markup for the front end
		return (
			<div { ...props }>
				<InnerBlocks.Content />
			</div>
		);
	},
} );
