# xfeedback
xFeedback - easy modx revolution extra

We can use this extra-component for comments, reviews or another feedback on site.
For use Component, you need add to content of page or to chunck [[!xFeedback]] snippet with options.

OPTIONS:
* &form=`1` - Output on page Form for feedback or not; default `0`
* &count=`10` - How many comments output on page, if `0`, then output all comments; default `0`
* &templ=`itemTemplate` - Template for every output comment; default `xFeedback.item`. You can update default chunck or add new. If you need deferent templates for comments on deferent pages, you can create two or more chuncks and use them.
* &random=`1` - Output random comments; default `0`
* &sort=`name` - Field for sorting of comments
* &dir=`DESC`

CHUNCKS:
* xFeedback.item
* xFeedback.form

File with styles - 'assets/components/xfeedback/css/web/main.xfeedback.css'
