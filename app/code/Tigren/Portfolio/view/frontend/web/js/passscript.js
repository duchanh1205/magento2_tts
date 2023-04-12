/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
define(["jquery"], function ($) {
    return (config) => {
        $(document).ready(function ($) {
            console.log(
                "Hello from magento theme, this take title from phtml:",
                config.title
            );
            console.log(
                "Hello from magento theme, this take desc from phtml:",
                config.desc
            );
        });
    };
});
