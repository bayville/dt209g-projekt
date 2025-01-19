const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.blockEditor;
const { RangeControl, SelectControl, PanelBody, PanelRow } = wp.components;
const ServerSideRender = wp.serverSideRender;

registerBlockType("gefle-workspace/space-block", {
  title: "Space Block",
  icon: "desktop",
  description: "Visar spaces i olika layouter",
  category: "widgets",
  attributes: {
    postsToShow: {
      type: "number",
      default: 3,
    },
    variant: {
      type: "string",
      default: "variant-1"
    }
  },
  edit: (props) => {
    const { postsToShow, variant } = props.attributes;
    return (
      <div className="space-block">
        <InspectorControls>
          <PanelBody
            title="Space Block Inställningar"
            initialOpen={true}
          >

              <RangeControl
                label="Antal spaces att visa"
                value={postsToShow}
                onChange={(newValue) => {
                  props.setAttributes({ postsToShow: newValue });
                }}
                min={-1}
                max={12}
                step={1}
                 help="-1 visar alla tillgängliga spaces"
                __next40pxDefaultSize
                __nextHasNoMarginBottom
              />
    
              <SelectControl
                label="Layout"
                value={variant}
                options={[
                  { label: 'Variant 1', value: 'variant-1' },
                  { label: 'Variant 2', value: 'variant-2' },
                  { label: 'Variant 1 sidebar', value: 'variant-1-sidebar' },
                  { label: 'Variant 2 sidebar', value: 'variant-2-sidebar' },
                ]}
                onChange={(newValue) => props.setAttributes({ variant: newValue })}
                __next40pxDefaultSize
                __nextHasNoMarginBottom
              />
          </PanelBody>
        </InspectorControls>

        <div className="space__container">
          <ServerSideRender
            block="gefle-workspace/space-block"
            attributes={props.attributes}
          />
        </div>
      </div>
    );
  },
  save: () => {
    return null;
  },
});