const { createHigherOrderComponent } = wp.compose;
const { BlockControls } = wp.blockEditor;
const { ToolbarButton } = wp.components;

const withMyPluginControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        if (props.name !== "acf/text-block") {
            return <BlockEdit key="edit" {...props} />;
        }
        console.dir(props.attributes.data);

        return (
            <>
                <BlockControls>
                    <ToolbarButton icon="editor-justify" title={"Copy"} onClick={() => copyContent(props)} />
                </BlockControls>

                <BlockEdit key="edit" {...props} />
            </>
        );
    };
}, "withMyPluginControls");

wp.hooks.addFilter("editor.BlockEdit", "my-plugin/with-inspector-controls", withMyPluginControls);

function copyContent(props) {
    let data = props.attributes.data;

    if (data) {
        alert("Relation = " + data.relation);
        alert("Title = " + data.title);
    }
}
