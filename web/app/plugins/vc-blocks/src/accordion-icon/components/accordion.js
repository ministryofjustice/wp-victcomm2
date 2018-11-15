/**
 * Accordion Wrapper
 */

// Setup the block
const { Component } = wp.element;

/**
 * Create a Accordion wrapper Component
 */
export default class Accordion extends Component {

	constructor( props ) {
		super( ...arguments );
	}

	render() {

		// Setup the attributes
		const { accordionTitle, accordionText } = this.props.attributes;

		return (	
			<div
				className={ this.props.className + ' vc-block-accordion' }
			>
				{ this.props.children }
			</div>
		);
	}
}
