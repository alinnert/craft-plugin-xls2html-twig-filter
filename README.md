# xls2html Twig Filter (for Craft CMS)

This is a [Craft CMS](http://craftcms.com) plugin that adds a `xls2html` filter to Twig templates.

All it does is converting a tabulator separated set of data into a HTML `<table>` tag.

This can be used to copy and paste a set of data from a spreadsheet software like *Microsoft Excel* into an input field in Craft. The pasted text gets converted into a table automagically.

## Usage

### Signature

~~~
xls2html( options )
~~~

|Option|Default value|Description
|------|-------------|-----------
|highlight|"^$"|Regular Expression. If the content of a cell matches this RegEx it gets surrounded by `<b></b>`.
|tableTag|`true`|If `true` a `<table>` tag gets printed. If you want to define your own `<table>` with its own class, id or other attributes, you can set this to `false`. In that case only a set of `<tr>` lines get printed.
|tableHead|`false`|If `true` the first row uses `<th>` instead of `<td>`.

### Examples

Just use the filter in your templates:

~~~twig
{{ entry.xlsData|xls2html }}
~~~

Using `highlight`, `tableTag` and `tableHead`:

~~~twig
<table class="some-table">
    {{ entry.xlsData|xls2html({tableTag: false, tableHead: true, highlight: '^Important:'}) }}
</table>
~~~

**Outputs:**

~~~html
<table class="some-table">
  <tr>
    <th>Hello</th>
    <th>World</th>
  </tr>
  <tr>
    <td><b>Important: 42</b></td>
    <td>Not so important: 24</td>
  </tr>
</table>
~~~

The parameter is about to change very soon. It will be more flexible and provide more options.
