define(["jquery", "Magento_Ui/js/modal/modal"], function ($, modal) {
    "use strict";
    $.widget("mage.test_js", {
        _create: function () {
            let options = {
                type: "popup",
                responsive: true,
                innerScroll: true,
                title: "TEST JS",
                buttons: [
                    {
                        text: $.mage.__("Cancel"),
                        class: "modal-close",
                        click: function () {
                            this.closeModal();
                        },
                    },
                    {
                        text: $.mage.__("Accept"),
                        class: "modal-close",
                        click: function () {
                            alert("Success!!!!");
                            this.closeModal();
                        },
                    },
                ],
            };

            modal(options, $("#modal-content"));
            $("#modal-btn").on("click", function () {
                $("#modal-content").modal("openModal");
            });
        },
    });
    return $.mage.test_js;
});
