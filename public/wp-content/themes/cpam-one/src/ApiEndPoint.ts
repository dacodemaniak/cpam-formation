import * as $ from 'jquery';

export class ApiEndPoint {
    private apiRoot: string = 'http://127.0.0.1/wp-json/wp/v2/';
    private posts: Array<any>;

    public constructor() {
        this.posts = new Array<any>();

        // Appel à l'API
        this.getPosts();
    }

    private getPosts(): void {
        $.ajax({
            url: this.apiRoot + 'posts',
            method: 'get',
            dataType: 'json',
            // On Success...
            success: (datas) => {
                this.render(datas);
            },
            error: (error) => {}
        });
    }

    private render(datas: any): void {
        // Créer un élément ul dans le DOM
        const list: JQuery = $('<ul>');

        // Parcourir le résultat de l'appel de l'API
        datas.forEach((data: any) => {
            const row: JQuery = $('<li>');
            row.html(data.title.rendered);
            // Ajouter le li dans le ul
            row.appendTo(list);
        });

        // Finalement... ajouter le tout dans ?
        list.appendTo($('[postsList]'));
    }
}