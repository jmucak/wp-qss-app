import { Toolbar, ToolbarButton } from '@wordpress/components';
import { formatBold, formatItalic, link } from '@wordpress/icons';

function MyToolbar() {
    return (
        <Toolbar label="Options">
            <ToolbarButton icon={ formatBold } label="Bold" />
            <ToolbarButton icon={ formatItalic } label="Italic" />
            <ToolbarButton icon={ link } label="Link" />
        </Toolbar>
    );
}