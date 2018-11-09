/**
 * BLOCK: Atomic Blocks Accordion Block
 */

// Import block dependencies and components
import Inspector from './components/inspector';
import Accordion from './components/accordion';
import icons from './components/icons';
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
	AlignmentToolbar,
	BlockControls,
	BlockAlignmentToolbar,
	InnerBlocks,
	MediaPlaceholder,
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
		selector: '.ab-accordion-text',
		source: 'children',
	},
	accordionAlignment: {
		type: 'string',
	},
	accordionFontSize: {
		type: 'number',
		default: 18
	},
	accordionOpen: {
		type: 'boolean',
		default: false
	},
	imageAlt: {
		attribute: 'alt',
	},
	imageUrl: {
		attribute: 'src',
	},
};

class AccordionIconBlock extends Component {

	render() {

		// Setup the attributes
		const { attributes: { accordionTitle, accordionText, accordionAlignment, accordionFontSize, accordionOpen }, isSelected, className, setAttributes } = this.props;

		const getImageButton = (openEvent) => {
			if(accordionOpen) {
				return (
					<img
						src="http://vcpivotspike.docker/app/uploads/2018/11/helen_portrait.jpg"
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
			// Show the block alignment controls on focus
			<BlockControls key="controls">
				<AlignmentToolbar
					value={ accordionAlignment }
					onChange={ ( value ) => this.props.setAttributes( { accordionAlignment: value } ) }
				/>
			</BlockControls>,
			// Show the block controls on focus
			<Inspector
				{ ...this.props }
			/>,
			// Show the button markup in the editor
			<Accordion { ...this.props }>
				<div style={{width: "200px", height: "200px", display: "none"}}>
					<MediaPlaceholder
						icon="format-image"
						labels={ {
							title: __( 'Icon' ),
						} }
						onSelect={ (media) => console.log('Received media', media) }
						accept="image/*"
						allowedTypes="image"
					/>
				</div>

				<div class="vc-accordion-summary">
					<MediaUpload
						onSelect={ media => { setAttributes({ imageAlt: media.alt, imageUrl: media.url }); } }
						type="image"
						value={ this.props.imageID }
						render={ ({ open }) => getImageButton(open) }
					/>

					<RichText
						tagName="p"
						placeholder={ __( 'Accordion Title' ) }
						value={ accordionTitle }
						className="vc-accordion-title"
						onChange={ ( value ) => this.props.setAttributes( { accordionTitle: value } ) }
					/>
				</div>

				<div class="ab-accordion-text">
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
		const { accordionTitle, accordionText, accordionAlignment, accordionFontSize, accordionOpen } = props.attributes;

		// Save the block markup for the front end
		return (
			<Accordion { ...props }>
				<details open={accordionOpen}>
					<summary class="ab-accordion-title">
						<RichText.Content 
							value={ accordionTitle }
						/>
					</summary>
					<div class="ab-accordion-text">
						<InnerBlocks.Content />
					</div>
				</details>
			</Accordion>
		);
	},

	deprecated: [ {
		attributes: {
			accordionText: {
				type: 'array',
				selector: '.ab-accordion-text',
				source: 'children',
			},
			...blockAttributes
		},

		migrate( attributes, innerBlocks  ) {
			return [
				omit( attributes, 'accordionText' ),
				[
					createBlock( 'core/paragraph', {
						content: attributes.accordionText,
					} ),
					...innerBlocks,
				],
			];
		},

		save( props ) {
			return (
				<Accordion { ...props }>
					<details open={ props.attributes.accordionOpen }>
						<summary class="ab-accordion-title">
							<RichText.Content 
								value={ props.attributes.accordionTitle }
							/>
						</summary>
						<RichText.Content 
							class="ab-accordion-text"
							tagName="p" 
							value={ props.attributes.accordionText }
						/>
					</details>
				</Accordion>
			);
		},
	} ],
} );
