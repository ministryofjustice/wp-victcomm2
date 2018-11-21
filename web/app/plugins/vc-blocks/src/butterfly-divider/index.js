/**
 * BLOCK: Butterfly Divider
 */

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Import icons
import icons from './components/icons';

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
registerBlockType( 'vc/butterfly-divider', {
	title: __( 'Butterfly Divider' ),
	description: __( 'A horizontal separator featuring the Victims\' Commissioner butterfly symbol.' ),
	icon: icons.butterfly,
	category: 'layout',
	keywords: [
		__( 'divider' ),
		__( 'separator' ),
		__( 'line' ),
	],
	attributes: [],

	// Render the block components
	// edit: AccordionIconGroupBlock,
	edit: function({ className }) {
		return (
			<div className={ className }>
				<hr />
				{ icons.butterfly }
			</div>
		);
	},

	// Save the attributes and markup
	save: function({ className }) {
		// Save the block markup for the front end
		return (
			<div className={ className }>
				<hr />
				{ icons.butterfly }
			</div>
		);
	},
} );
