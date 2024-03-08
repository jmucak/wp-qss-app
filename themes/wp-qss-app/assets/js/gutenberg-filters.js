const spacerInspectorControls = wp.compose.compose(

    wp.blockEditor.withColors({backgroundColor: 'background-color'}),

    wp.compose.createHigherOrderComponent((BlockEdit) => {
        return (props) => {

            if (props.name !== 'core/spacer') {
                return(<BlockEdit {...props} />);
            }

            const { Fragment } = wp.element;
            const { InspectorControls, PanelColorSettings } = wp.blockEditor;
            const { attributes, setAttributes, isSelected } = props;
            const { backgroundColor, setBackgroundColor } = props;

            let newClassName = (attributes.className != undefined) ? attributes.className : '';
            let newStyles = {...props.style};
            if (backgroundColor != undefined) {
                if (backgroundColor.class == undefined) {
                    newStyles.backgroundColor = backgroundColor.color;
                } else {
                    newClassName += ' ' + backgroundColor.class;
                }
            }

            const newProps = {
                ...props,
                attributes: {
                    ...attributes,
                    className: newClassName
                },
                style: newStyles
            }

            return (
                <Fragment>
                    <div style={newStyles} className={newClassName}>
                        <BlockEdit {...newProps} />
                        {isSelected && (props.name == 'core/spacer') &&
                            <InspectorControls>
                                <PanelColorSettings
                                    title={wp.i18n.__('Color Settings', 'awp')}
                                    colorSettings={[
                                        {
                                            value: backgroundColor.color,
                                            onChange: setBackgroundColor,
                                            label: wp.i18n.__('Background color', 'awp')
                                        }
                                    ]}
                                />
                            </InspectorControls>
                        }
                    </div>
                </Fragment>
            );
        };
    }, 'spacerInspectorControls'));

wp.hooks.addFilter(
    'editor.BlockEdit',
    'awp/spacer-inspector-control',
    spacerInspectorControls
);