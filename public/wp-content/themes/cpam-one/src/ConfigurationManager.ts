import * as $ from 'jquery';

export class ConfigurationManager {
    private button: JQuery = $('#add');
    private form: JQuery = $('#new-config');

    public constructor() {
        this.setEventListener();
    }

    private setEventListener(): void {
        this.form.on(
            'keyup',
            (event: any): void => this.manageForm(event)
        );
    }

    private manageForm(event: any): void {
        const title: JQuery = $('#title');
        const value: string = title.val().toString().trim();

        if (value.length >= 5) {
            this.button.removeAttr('disabled');
        } else {
            this.button.attr('disabled', 'disabled');
        }
    }
}