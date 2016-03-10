# xfeedback
xFeedback - easy modx revolution extra

We can use this extra-component for comments, reviews or another feedback on site.
For use Component, you need add to content of page or to chunck `[[!xFeedback]]` snippet with options.

OPTIONS:
* &form=\`1\` - Output on page Form for feedback or not; default \`0\`
* &count=\`10\` - How many comments output on page, if \`0\`, then output all comments; default \`0\`
* &templ=\`itemTemplate\` - Template for every output comment; default \`xFeedback.item\`. You can update default chunck or add new. If you need deferent templates for comments on deferent pages or deferent places of one page, you can create two or more chuncks and use them.
* &random=\`1\` - Output random comments; default \`0\`
* &sort=\`name\` - Field for sorting of comments
* &dir=\`DESC\`

CHUNCKS:
* `xFeedback.item`
* `xFeedback.form`

File with styles - `assets/components/xfeedback/css/web/main.xfeedback.css`

---------------------------------------------------------------------------
xFeedback - простой компонент для modx revolution

Мы можем использовать данный компонент, чтобы добавить на сайт комментарии и отзывы.
Для того, чтобы воспользоваться компонентом, нужно просто добавить на страницу или в чанк сниппет `[[!xFeedback]]` с опциями.

ОПЦИИ:
* &form=\`1\` - Выводить ли на страницу форму для комментариев; по умолчанию \`0\`
* &count=\`10\` - Количество выводимых комментариев, если указать \`0\`, тогда будут выведены все комментарии; по умолчанию \`0\`
* &templ=\`itemTemplate\` - Шаблон для вывода комментариев; по умолчанию \`xFeedback.item\`. Вы можете изменять существующий чанк или создать и использовать новый. Если вам потребуется использовать разные шаблоны комментариев на разных страницах, или даже в разных местах одной страницы, тогда вы можете создать два или более чанка и зывать их в разных объявлениях сниппета.
* &random=\`1\` - Рандомный вывод комментариев; по умолчанию \`0\`
* &sort=\`name\` - Поле для сортировки
* &dir=\`DESC\` - Направление сортировки

ЧАНКИ:
* `xFeedback.item`
* `xFeedback.form`

Файл со стилями формы и комментариев - `assets/components/xfeedback/css/web/main.xfeedback.css`
