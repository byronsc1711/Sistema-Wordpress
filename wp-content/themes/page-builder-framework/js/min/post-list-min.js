"use strict";function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(c){function e(){var e,i,u,t,o=c(this).closest(".inline-edit-row-page");!o.length||(t=(t=o[0].id).replace("edit-",""))&&(!(e=document.querySelector("#post-"+t))||(i=e.querySelector(".wpbf-quick-edit-preset-values"))&&(u=o[0].querySelectorAll(".wpbf-quick-edit-fields-area")).forEach(function(e){var t,o,c=e.dataset.wpbfFieldsGroupName,r=u.dataset.wpbfFieldsGroupType;c&&r&&(o="checkbox"===r?(t=document.querySelectorAll(".wpbf-quick-edit-use-preset:checked"),o=[],t.forEach(function(e){o.push(e.value)}),o.join(",")):(t=document.querySelector(".wpbf-quick-edit-use-preset:checked"),field?field.value:value),i.setAttribute("data-wpbf-"+c,o))}))}var t;(t=document.querySelector("#wpbf_layout-hide"))&&(t.parentNode.style.display="none"),function(){if(!inlineEditPost)return;var c=inlineEditPost.edit;inlineEditPost.edit=function(e){c.apply(this,arguments);var t,o,i,u=0;"object"==_typeof(e)&&(u=parseInt(this.getId(e))),!u||(t=document.querySelector("#edit-"+u))&&(!(o=document.querySelector("#post-"+u))||(i=o.querySelector(".wpbf-quick-edit-preset-values"))&&(t.querySelectorAll(".wpbf-quick-edit-use-preset").forEach(function(e){var t=e.parentNode.parentNode.querySelector("label"),o=e.dataset.wpbfPresetName,c=i.getAttribute("data-wpbf-"+o),r="wpbf-quick-edit-post-"+u+"-"+o+"-"+e.value.replace(/ /g,"-");e.id=r,t.htmlFor=r,"checkbox"===e.type?(c=c.split(",")).includes(e.value)?e.checked=!0:e.checked=!1:"radio"===e.type&&(c==e.value?e.checked=!0:e.checked=!1)}),t.querySelectorAll(".wpbf-quick-edit-nonce-field").forEach(function(e){var t=(t=e.name.replace(/_/g,"-")).replace("[]",""),o=i.getAttribute("data-"+t);e.value=o})))}}(),c(document).on("click",".inline-edit-save .save",e)}(jQuery);