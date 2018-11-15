/**
 * BLOCK: Atomic Blocks Accordion Block
 */

// Import block dependencies and components
import Inspector from './components/inspector';
import Accordion from './components/accordion';
import omit from 'lodash/omit';

// Import CSS
import './styles/style.scss';
import './styles/editor.scss';

// Components
const { __ } = wp.i18n;

// Extend component
const { Component } = wp.element;

// Register block
const { 
	registerBlockType,
	createBlock,
} = wp.blocks;

// Register editor components
const {
	RichText,
	BlockControls,
	InnerBlocks,
	MediaUpload,
} = wp.editor;

// Register components
const {
	Button,
	withFallbackStyles,
	IconButton,
	Dashicon,
} = wp.components;

const blockAttributes = {
	accordionTitle: {
		type: 'array',
		selector: '.vc-accordion-title',
		source: 'children',
	},
	accordionText: {
		type: 'array',
		selector: '.vc-accordion-text',
		source: 'children',
	},
	accordionOpen: {
		type: 'boolean',
		default: false,
	},
	iconAlt: {
		type: 'string',
		// attribute: 'alt',
	},
	iconUrl: {
		type: 'string',
		// attribute: 'src',
	},
};

class AccordionIconBlock extends Component {

	render() {

		// Setup the attributes
		const { attributes: { accordionTitle, accordionText, accordionOpen, iconAlt, iconUrl }, isSelected, className, setAttributes } = this.props;

		const getImageButton = (openEvent) => {
			if(iconUrl) {
				return (
					<img
						src={ iconUrl }
						alt={ iconAlt }
						onClick={ openEvent }
						className="vc-accordion-icon"
					/>
				);
			}
			else {
				return (
					<div className="vc-accordion-icon-button">
						<IconButton
							icon="format-image"
							onClick={ openEvent }
						/>
					</div>
				);
			}
		};

		return [
			<BlockControls key="controls">
			</BlockControls>,
			// Show the block controls on focus
			<Inspector
				{ ...this.props }
			/>,
			// Show the button markup in the editor
			<Accordion { ...this.props }>
				<div className="vc-accordion-summary">
					<MediaUpload
						onSelect={ media => { setAttributes({ iconAlt: media.alt, iconUrl: media.url }); } }
						type="image"
						value={ this.props.imageID }
						render={ ({ open }) => getImageButton(open) }
					/>

					<RichText
						tagName="h2"
						placeholder={ __( 'Accordion Title' ) }
						value={ accordionTitle }
						className="vc-accordion-title"
						onChange={ ( value ) => this.props.setAttributes( { accordionTitle: value } ) }
					/>

					<Dashicon
						icon="arrow-up-alt2"
						className="vc-accordion-toggle"
					/>
				</div>

				<div className="vc-accordion-text">
					<InnerBlocks />
				</div>
			</Accordion>
		];
	}
}

// Register the block
registerBlockType( 'accordion-icon-block/accordion-icon', {
	title: __( 'Accordion & Icon' ),
	description: __( 'Add accordion block with an icon, a title and text.' ),
	icon: 'editor-ul',
	category: 'common',
	keywords: [
		__( 'accordion' ),
		__( 'list' ),
		__( 'icon' ),
	],
	attributes: blockAttributes,

	// Render the block components
	edit: AccordionIconBlock,

	// Save the attributes and markup
	save: function( props ) {

		// Setup the attributes
		const { accordionTitle, accordionText, accordionOpen } = props.attributes;

		alert('Save function running');

		// Save the block markup for the front end
		return (
			<Accordion { ...props }>
				<details open={accordionOpen}>
					<summary className="vc-accordion-summary">
						<h2>
							<RichText.Content
								value={ accordionTitle }
							/>
						</h2>
					</summary>
					<div className="vc-accordion-text">
						<InnerBlocks.Content />
					</div>
				</details>
			</Accordion>
		);
	},
} );
