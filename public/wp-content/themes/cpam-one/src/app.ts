import * as $ from 'jquery';
import 'bootstrap';

import { Toggler } from './toggler/toggler';
import { ConfigurationManager } from './ConfigurationManager';
/**
 * @name App
 * @author Vaelia
 * @version 1.0.0
 * @abstract Main entry for client application
 */

import './main.scss';
import { ApiEndPoint } from './ApiEndPoint';

export class App {
    public constructor() {
        console.log('App is running after platform is ready');
        const toggler: Toggler = new Toggler('article header');

        // Instanciation de la classe
        const api: any = new ApiEndPoint();

        // Configuration Managing
        const configManager: ConfigurationManager = new ConfigurationManager();
    }
}

// Bootstrap the app after DOM is ready
$(document).ready(() => {
    const app: App = new App();
});
