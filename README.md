# xls2html Twig Filter (for Craft CMS)

This is a [Craft CMS](http://craftcms.com) plugin that adds a `xls2html` filter to Twig templates.

All it does is converting a tabulator separated set of data into a HTML `<table>` tag.

This can be used to copy and paste a set of data from a spreadsheet software like *Microsoft Excel* into an input field in Craft. The pasted text gets converted into a table automagically.

## Usage

Just use the filter in your templates

~~~twig
{{ entry.xlsData|xls2html }}
~~~

Currently it also has the ability to surround the content of a cell with a `<b>` element if the content matches the *Regular Expression* you pass as the first parameter.

~~~twig
{{ entry.xlsData|xls2html('^Important:') }}
~~~

**Outputs:**

~~~html
<table>
  <tr>
    <td>Hello</td>
    <td>World</td>
  </tr>
  <tr>
    <td><b>Important: 42</b></td>
    <td>Not so important: 24</td>
  </tr>
</table>
~~~

The parameter is about to change very soon. It will be more flexible and provide more options.
