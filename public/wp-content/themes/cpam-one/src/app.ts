import * as $ from 'jquery';

/**
 * @name App
 * @author Vaelia
 * @version 1.0.0
 * @abstract Main entry for client application
 */

import './main.scss';

export class App {
    public constructor() {
        console.log('App is running after platform is ready');
    }
}

// Bootstrap the app after DOM is ready
$(document).ready(() => {
    const app: App = new App();
});
