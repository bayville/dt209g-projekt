(()=>{function t(t,n){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var n=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=n){var r,a,l,c,o=[],i=!0,u=!1;try{if(l=(n=n.call(t)).next,0===e){if(Object(n)!==n)return;i=!1}else for(;!(i=(r=l.call(n)).done)&&(o.push(r.value),o.length!==e);i=!0);}catch(t){u=!0,a=t}finally{try{if(!i&&null!=n.return&&(c=n.return(),Object(c)!==c))return}finally{if(u)throw a}}return o}}(t,n)||e(t,n)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function e(t,e){if(t){if("string"==typeof t)return n(t,e);var r={}.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?n(t,e):void 0}}function n(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=Array(e);n<e;n++)r[n]=t[n];return r}var r=wp.blocks.registerBlockType,a=wp.element,l=a.useState,c=a.useEffect,o=wp.components,i=o.SelectControl,u=o.Spinner;wp.blockEditor.RichText,r("gefle-workspace/hello-world",{title:"CTA Block",icon:"megaphone",category:"design",attributes:{selectedPostId:{type:"number",default:null},ctaText:{type:"string",default:""},ctaBtnText:{type:"string",default:""},ctaBtnLink:{type:"string",default:""}},edit:function(r){var a,o=r.attributes,s=r.setAttributes,f=o.selectedPostId,d=(o.ctaText,o.ctaBtnText,o.ctaBtnLink,t(l([]),2)),m=d[0],p=d[1],b=t(l(!0),2),y=b[0],h=b[1];return c((function(){wp.apiFetch({path:"/wp/v2/cta"}).then((function(t){console.log("Fetchedposts",t),p(t),h(!1)})).catch((function(){p([]),h(!1)}))}),[]),React.createElement("div",{className:"cta-block-editor"},y?React.createElement(u,null):React.createElement(i,{label:"Välj ett CTA-inlägg",value:f,options:[{label:"Välj ett inlägg",value:""}].concat((a=m.map((function(t){return{label:t.title.rendered,value:t.id}})),function(t){if(Array.isArray(t))return n(t)}(a)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(a)||e(a)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}())),onChange:function(t){var e=m.find((function(e){return e.id===parseInt(t)}));s(e?{selectedPostId:parseInt(t),ctaText:e.meta.cta_text,ctaBtnText:e.meta.cta_btn_text,ctaBtnLink:e.meta.cta_btn_link}:{selectedPostId:null,ctaText:"",ctaBtnText:"",ctaBtnLink:""})}}))},save:function(t){var e=t.attributes,n=e.selectedPostId,r=e.ctaText,a=e.ctaBtnText,l=e.ctaBtnLink;return React.createElement("div",{className:"cta-block"},React.createElement("div",{className:"cta-content","data-post-id":n},r&&React.createElement("p",null,r),a&&l&&React.createElement("a",{href:l,className:"btn bg-primary"},a)))}})})();