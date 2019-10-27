import * as $ from 'jquery';

export class Toggler {
    private selector: string;

    public constructor(selector: string) {
        this.selector = selector;
        this.setListener();
    }

    private setListener() {
        $(this.selector).on(
            'click',
            (event: any): void => this.toggle(event) 
        );
    }

    private toggle(event: any): void {
        const element: JQuery = $(event.target);
        
        console.log(element.is('h2') ? 'h2 clicked' : 'other element clicked');

        const content: JQuery = element.parent().next('.article-content');

        content.toggleClass('hidden');
    }
}