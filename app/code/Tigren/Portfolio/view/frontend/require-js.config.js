/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
var config = {
    <!--Create a RequireJS config file (code challenge 1)-->
    map: {
        '*': {
            customscripts: 'Tigren_Portfolio/js/customscripts',
            'Magento_Sales/js/order/create/scripts':
                'Tigren_Portfolio/js/customscripts',
            magescript: 'Tigren_Portfolio/js/magescripts',
            'mywidget': 'Tigren_Portfolio/js/mywidget',
            'kiwicount': 'Tigren_Portfolio/js/kiwicount',
            test_js: 'Tigren_Portfolio/js/test_js.js'
        }
    },
    deps: ['js/globalscripts.js'],
    paths: {
        'alias script': 'Tigren_Portfolio/js/script'
    },
    config: {
        map: {
            '*': {
                'mage/kiwicount': 'Tigren_Portfolio/js/kiwicount-mixin'
            }
        },
        mixins: {
            'mage/kiwicount': {
                'Tigren_Portfolio/js/kiwicount-mixin': true
            }
        }
    }
};
