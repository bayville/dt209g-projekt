const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.blockEditor;
const { RangeControl, SelectControl, PanelBody, PanelRow } = wp.components;
const ServerSideRender = wp.serverSideRender;

registerBlockType("gefle-workspace/employee-block", {
  title: "Employee Block",
  icon: "admin-users",
  description: "Visar anställda",
  category: "widgets",
  attributes: {
    postsToShow: {
      type: "number",
      default: 3,
    },
  },
  edit: (props) => {
    const { postsToShow, variant } = props.attributes;
    return (
      <div className="employee-block">
        <InspectorControls>
          <PanelBody
            title="Employee Block Inställningar"
            initialOpen={true}
          >

              <RangeControl
                label="Antal employees att visa"
                value={postsToShow}
                onChange={(newValue) => {
                  props.setAttributes({ postsToShow: newValue });
                }}
                min={-1}
                max={12}
                step={1}
                 help="-1 visar alla tillgängliga employees"
                __next40pxDefaultSize
                __nextHasNoMarginBottom
              />
          </PanelBody>
        </InspectorControls>

        <div className="employee__container">
          <ServerSideRender
            block="gefle-workspace/employee-block"
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