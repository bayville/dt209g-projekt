const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.blockEditor;
const { RangeControl } = wp.components;
const ServerSideRender = wp.serverSideRender;


registerBlockType('gefle-workspace/space-block', {
    title: 'Space Block',
    icon: 'desktop',
    description: 'Visar upp till 9 rum',
    category: 'widgets',
    attributes: {
        postsToShow: {
            type: 'number',
            default: 2,
        },
    },
    supports: {
        align: true,
        html: false
    },
    edit: (props) => {
      const { postsToShow } = props.attributes;
      return (
          <div className="space-block">
              <InspectorControls>
                  <RangeControl
                      label="Antal utrymmen att visa"
                      value={postsToShow}
                      onChange={(newValue) => {
                          props.setAttributes({ postsToShow: newValue });
                      }}
                      min={1}
                      max={9}
                      step={1}
                  />
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