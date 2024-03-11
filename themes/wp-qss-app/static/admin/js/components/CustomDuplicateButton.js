const { createHigherOrderComponent } = wp?.compose;
const { BlockControls } = wp?.blockEditor;
const { ToolbarButton } = wp?.components;
const { useDispatch } = wp?.data;

export class CustomDuplicateButton {
    init() {
        wp?.hooks.addFilter("editor.BlockEdit", "my-plugin/with-inspector-controls", this.withMyPluginControls);
    }

    withMyPluginControls = createHigherOrderComponent((BlockEdit) => {
        return (props) => {
            if (props.name !== "acf/text-block") {
                return <BlockEdit {...props} />;
            }
            const dispatch = useDispatch();

            const handleButtonClick = async () => {
                // Change the content when the button is clicked
                try {
                    let data = props.attributes.data;

                    // Generate a nonce
                    const restUrl = `${wpApiSettings.root}wp/v2/movie/${data.relation}?_fields=id,content&context=edit`;
                    const nonce = wpApiSettings.nonce;

                    // Set up the fetch request headers
                    const headers = new Headers({
                        "Content-Type": "application/json",
                        "X-WP-Nonce": nonce, // Include the nonce in the X-WP-Nonce header
                    });

                    const response = await fetch(restUrl, {
                        method: "GET",
                        headers: headers,
                    });

                    const pageData = await response.json();
                    const unrenderedBlocks = pageData.content.raw;
                    const blocks = wp.blocks.parse(unrenderedBlocks);
                    console.dir(blocks);
                    // Parse the raw block data to extract individual blocks
                    // const parsedBlocks = JSON.parse(unrenderedBlocks);

                    dispatch("core/block-editor").removeBlock(props.clientId);
                    // let insertedBlock = wp.blocks.createBlock("core/paragraph", {
                    //     content: "New paragraph content",
                    // });
                    dispatch("core/block-editor").insertBlocks(blocks);
                } catch (error) {
                    console.error("Error fetching page content:", error);
                }
            };

            return (
                <>
                    <BlockControls>
                        <ToolbarButton icon="editor-justify" title={"Copy"} onClick={handleButtonClick} />
                    </BlockControls>

                    <BlockEdit {...props} />
                </>
            );
        };
    }, "withMyPluginControls");

    copyContent(props) {
        let data = props.attributes.data;
        props.setAttributes({
            content: data.relation,
        });

        console.log(props);

        if (data) {
            alert("Relation = " + data.relation);
            alert("Title = " + data.title);
        }
    }
}
